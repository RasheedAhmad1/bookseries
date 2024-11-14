<?php

namespace Modules\Book\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Book\App\Models\Book;
use Modules\Author\App\Models\Author;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('book::index', [
            'books' => $books,

        ]);
    }

    // Display a listing of the resource.
    public function dashboard()
    {
        return view('book::dashboard');
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $authors = Author::all();
        $book = Book::get(['status']);
        $statuses = Book::statuses;

        return view('book::create', [
            'authors' => $authors,
            'statuses' => $statuses,
            'book' => $book
        ]);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $book = Book::create($request->all());
        $book->addAllMediaFromTokens();

        // if ($request->hasFile('image')) {
        //     foreach ($request->file('image') as $image)
        //         $book->addMedia($image)->toMediaCollection('images');
        // }

        return redirect()->route('books.show')->with('success', 'Book added successfully!');
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

    // Show the specified resource.
    public function show($id)
    {
        // $user = auth()->user();

        // // Check if the user has access to this book
        // if (!$user->hasPrivilegeFor($book)) {
        //     abort(403, 'Unauthorized access to this book.');
        // }

        $decrypted_id = Crypt::decrypt($id);
        $book = Book::findOrFail($decrypted_id);

        return view('book::show', [
            'book' => $book
        ]);
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $decrypted_id = Crypt::decrypt($id);
        $book = Book::findOrFail($decrypted_id);
        $statuses = Book::statuses;
        $authors = Author::all();

        return view('book::edit', [
            'book' => $book,
            'statuses' => $statuses,
            'authors' => $authors,

        ]);
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {

        $book = Book::where('id', $id)->first();

        $book->title = $request->title;
        $book->description = $request->description;
        $book->publisher = $request->publisher;
        $book->language = $request->language;
        $book->orderNo = $request->orderNo;
        $book->status = $request->status;
        $book->price = $request->price;
        $book->online_amount = $request->online_amount;
        $book->ship_amount = $request->ship_amount;
        $book->author_id = $request->author_id;

        $book->addAllMediaFromTokens();


        // if ($request->hasFile('image')) {
        //     $book->clearMediaCollection('images'); // all media in the images collection will be deleted

        //     foreach ($request->file('image') as $image) {
        //         $book->addMedia($image)->toMediaCollection('images');
        //     }
        // }
        $book->save();
        return redirect()->route('books.show')->with('success', 'Book updated successfully!');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $decrypted_id = Crypt::decrypt($id);
        $book = Book::findOrFail($decrypted_id);

        if ($book) {
            $book->delete();
            return response()->json(['success' => 'Book deleted successfully.']);
        } else {
            return response()->json(['error' => 'Book not found.'], 404);
        }
    }
}
