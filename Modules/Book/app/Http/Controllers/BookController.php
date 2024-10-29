<?php

namespace Modules\Book\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Book\App\Models\Book;
use Modules\Book\App\Models\Author;

class BookController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $books = Book::all();
        return view('book::books.showBooks', [
            'books' => $books,
        ]);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $authors = Author::all();
        $statuses = Book::statuses;
        return view('book::books.addBook', ['authors' => $authors, 'statuses' => $statuses]);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $book = Book::create($request->all());

        // if ($request->hasFile('image')) {
        //     $book->addMediaFromRequest('image')->toMediaCollection('images');
        // }

        return redirect()->route('books.show')->with('success', 'Book added successfully!');
    }

    // Show the specified resource.
    public function show($id)
    {
        return view('book::books.addBook');
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $book= Book::findOrFail($id);
        $statuses = Book::statuses;
        $authors = Author::all();
        return view('book::books.editBook', [
            'book' => $book,
            'statuses' => $statuses,
            'authors' => $authors
        ]);
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {

        $books = Book::where('id', $id)->first();

        $books->title = $request->title;
        $books->description = $request->description;
        $books->publisher = $request->publisher;
        $books->language = $request->language;
        $books->orderNo = $request->orderNo;
        $books->status = $request->status;
        $books->price = $request->price;
        $books->online_amount = $request->online_amount;
        $books->ship_amount = $request->ship_amount;
        $books->author_id = $request->author_id;

        // if ($request->hasFile('image')) {
        //     $books->clearMediaCollection('images'); // all media in the images collection will be deleted
        //     $books->addMediaFromRequest('image')->toMediaCollection('images');
        // }

        $books->save();

        return redirect()->route('books.show')->with('success', 'Book updated successfully!');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('books.show')->with('danger', 'Book deleted successfully!');
    }
}
