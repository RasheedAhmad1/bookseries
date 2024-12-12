<?php

namespace Modules\Book\App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Book\App\Models\Book;
use App\Http\Controllers\Controller;
use Modules\Book\App\Models\Section;
use Illuminate\Support\Facades\Crypt;
use Modules\Author\App\Models\Author;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Contracts\Encryption\DecryptException;


class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($book_id)
    {
        try {
            $decrypt_id = Crypt::decrypt($book_id);
        } catch (DecryptException $e) {
            abort(404, 'Invalid book ID.');
        }
        $book = Book::findOrFail($decrypt_id);
        $sections = Section::where('book_id', $decrypt_id)->get();
        return view('book::section.index', [
            'book_id' => $book_id,
            'sections' => $sections,
            'book' => $book
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $decrypt_id = Crypt::decrypt($id);
        $book = Book::findOrFail($decrypt_id);
        $sections = Section::where('book_id', $decrypt_id)->get();


        return view('book::section.create', [
            'sections' => $sections,
            'book' => $book,
            // 'author' => $book->author_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $book_id)
    {
        try {
            $decrypt_id = Crypt::decrypt($book_id);
        } catch (DecryptException $e) {
            abort(404, 'Invalid book ID.');
        }
        $requestData['book_id'] = $decrypt_id;
        $requestData = $request->all();
        $section = Section::create($requestData);
        $section->addAllMediaFromTokens();

        $encrypted_book_id = Crypt::encrypt($decrypt_id);

        return redirect()->route('sections.index', $encrypted_book_id)->with('success', 'Section added successfully!');
    }

    //Upload ckeditor images method
    public function uploadImage(Request $request): JsonResponse
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'public');

            $url = Storage::url($path);

            return response()->json([
                'uploaded' => true,
                'url' => $url
            ]);
        }

        return response()->json([
            'uploaded' => false,
            'error' => ['message' => 'File upload failed']
        ]);
    }


    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('book::section.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $decrypt_id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            abort(404, 'Invalid book ID');
        }
        $section = Section::findOrFail($decrypt_id);
        $authors = Author::all();

        return view('book::section.edit', [
            'section' => $section,
            'authors' => $authors
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $section_id)
    {

        try {
            $decrypt_id = Crypt::decrypt($section_id);
        } catch (DecryptException $e) {
            abort(404, 'Invalid book ID');
        }
        $section = Section::findOrFail($decrypt_id);
        $section->addAllMediaFromTokens();

        $section->update($request->all());
        // encrypt the id again for redirect it
        $encrypted_book_id = Crypt::encrypt($section->book_id);


        return redirect()->route('sections.index', $encrypted_book_id)
            ->with('success', 'Section updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($section_id)
    {

        try {
            $decrypt_id = Crypt::decrypt($section_id);
        } catch (DecryptException $e) {
            abort(404, 'Invalid section ID');
        }

        $section = Section::findOrFail($decrypt_id);


        if ($section) {
            $section->delete();
            return response()->json(['success' => 'Section deleted successfully.']);
        } else {
            return response()->json(['error' => 'Section not found.'], 404);
        }
    }
}
