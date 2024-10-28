<?php

namespace Modules\Book\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Book\App\Models\Author;
use Modules\Book\App\Models\Book;

class AuthorController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $authors = Author::all();
        return view('book::authors.showAuthors', [
            'authors' => $authors,
        ]);
    }

    // Show the form for creating a new resource
    public function create()
    {
        $authors = Author::all();
        return view('book::authors.addAuthor', ['authors' => $authors]);
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        //
    }

    // Show the specified resource
    public function show($id)
    {
        return view('book::show');
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $author = Author::findOrFail($id);
        $books = Book::all();
        return view('book::books.editBook', [
            'authors' => $author,
            'books' => $books
        ]);
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        //
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        //
    }
}
