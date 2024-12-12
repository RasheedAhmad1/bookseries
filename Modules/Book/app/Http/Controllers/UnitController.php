<?php

namespace Modules\Book\App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Book\App\Models\Unit;
use App\Http\Controllers\Controller;
use Modules\Book\App\Models\Section;
use Illuminate\Support\Facades\Crypt;
use Modules\Author\App\Models\Author;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Contracts\Encryption\DecryptException;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($section_id)
    {
        try {
            $decrypt_id = Crypt::decrypt($section_id);
        } catch (DecryptException $e) {
            abort(404, 'Invalid section ID.');
        }
        $section = Section::findOrFail($decrypt_id);
        $units = Unit::where('section_id', $decrypt_id)->get();

        return view('book::units.index', [
            'section_id' => $section_id,
            'section' => $section,
            'units' => $units
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($section_id)
    {
        try {
            $decrypt_id = Crypt::decrypt($section_id);
        } catch (DecryptException $e) {
            abort(404, 'Invalid section ID.');
        }

        $section = Section::findOrFail($decrypt_id);


        return view('book::units.create', [
            'section' => $section
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $section_id)
    {
        try {
            $decrypt_id = Crypt::decrypt($section_id);
        } catch (DecryptException $e) {
            abort(404, 'Invalid section Id');
        }

        $requestData['section_id'] = $decrypt_id;
        $requestData = $request->all();
        $unit = Unit::create($requestData);
        $unit->addAllMediaFromTokens();

        $encrypted_section_id = Crypt::encrypt($decrypt_id);

        return redirect()->route('units.index', $encrypted_section_id)->with('success', 'Unit added successfully!');
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
        return view('book::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($unit_id)
    {
        try {
            $decrypt_id = Crypt::decrypt($unit_id);
        } catch (DecryptException $e) {
            abort(404, 'Invalid unit ID');
        }

        // $unit = Unit::with('section.book')->findOrFail($decrypt_id);
        // // Access the book through the relationships
        // $book = $unit->section->book;
        $unit = Unit::findOrFail($decrypt_id);
        $section_id = $unit->section_id;
        $section = Section::findOrFail($section_id);

        return view('book::units.edit', [
            'unit' => $unit,
            'section' => $section
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $unit_id)
    {
        try {
            $decrypt_id = Crypt::decrypt($unit_id);
        } catch (DecryptException $e) {
            abort(404, 'Invalid unit ID');
        }

        $unit = Unit::findOrFail($decrypt_id);
        $unit->addAllMediaFromTokens();

        $unit->update($request->all());

        //encrypt the ID again for redirect it
        $encrypt_unit_ID = Crypt::encrypt($unit->section_id);
        return redirect()->route('units.index', $encrypt_unit_ID)
            ->with('success', 'Unit updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($unit_id)
    {
        try {
            $decrypt_id = Crypt::decrypt($unit_id);
        } catch (DecryptException $e) {
            abort(404, 'Invalid unit ID');
        }

        $unit = Unit::findOrFail($decrypt_id);

        if ($unit) {
            $unit->delete();
            return response()->json(['success' => 'Unit deleted successfully.']);
        } else {
            return response()->json(['error' => 'Unit not found.'], 404);
        }
    }
}
