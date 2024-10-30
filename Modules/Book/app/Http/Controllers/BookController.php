<?php

namespace Modules\Book\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Book\App\Models\Book;
use Modules\Book\App\Models\Author;
use Illuminate\Support\Facades\Crypt;

class BookController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $books = Book::all();
        return view('book::books.showBooks', [
            'books' => $books
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

        $decrypted_id = Crypt::decrypt($id);
        $book= Book::findOrFail($decrypted_id);
        return view('book::books.show');
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $decrypted_id = Crypt::decrypt($id);
        $book = Book::findOrFail($decrypted_id);
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

        // if ($request->hasFile('image')) {
        //     $book->clearMediaCollection('images'); // all media in the images collection will be deleted
        //     $book->addMediaFromRequest('image')->toMediaCollection('images');
        // }

        $book->save();

        return redirect()->route('books.show')->with('success', 'Book updated successfully!');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $decrypted_id = Crypt::decrypt($id);
        $book = Book::find($decrypted_id);
        $book->delete();
        return redirect()->route('books.show')->with('danger', 'Book deleted successfully!');
    }
}
