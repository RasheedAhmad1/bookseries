<?php

namespace Modules\Book\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Book\App\Models\Author;
use Illuminate\Support\Facades\Crypt;

class AuthorController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $authors = Author::all();
        $breadcrumbs = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => 'Dashboard', 'url' => route('book.dashboard')],
            ['name' => 'Authors']

        ];
        return view('book::authors.showAuthors', [
            'authors' => $authors,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Show the form for creating a new resource
    public function create()
    {
        $authors = Author::all();
        $breadcrumbs = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => 'Dashboard', 'url' => route('book.dashboard')],
            ['name' => 'Authors', 'url' => route('authors.show')],
            ['name' => 'New Author']


        ];
        return view('book::authors.addAuthor', [
            'authors' => $authors,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $author = Author::create($request->all());
        return redirect()->route('authors.show')->with('success', 'Author added successfully!');
    }

    // Show the specified resource
    public function show($id)
    {
        $decrypted_id = Crypt::decrypt($id);
        $author= Author::findOrFail($decrypted_id);
        return view('book::authors.show');
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $decrypted_id = Crypt::decrypt($id);
        $author= Author::findOrFail($decrypted_id);
        $breadcrumbs = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => 'Dashboard', 'url' => route('book.dashboard')],
            ['name' => 'Authors', 'url' => route('authors.show')],
            ['name' => 'Edit Author']
        ];
        return view('book::authors.editAuthor', [
            'author' => $author,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $author = Author::where('id', $id)->first();

        $author->name = $request->name;
        $author->slug = $request->slug;
        $author->description = $request->description;

        $author->save();

        return redirect()->route('authors.show')->with('success', 'Author updated successfully!');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $author = Author::find($id);

        if ($author) {
            $author->delete();
            return response()->json(['success' => 'Author deleted successfully.']);
        } else {
            return response()->json(['error' => 'Book not found.'], 404);
        }
    }
}
