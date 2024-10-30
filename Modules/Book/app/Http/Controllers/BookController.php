<?php

namespace Modules\Book\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Book\App\Models\Book;
use Modules\Book\App\Models\Author;

class BookController extends Controller
{

    public function index()
    {
        $breadcrumbs = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => 'Dashboard']

        ];
        return view('book::index', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Display a listing of the resource.
    public function showBooks()
    {
        $books = Book::all();
        $breadcrumbs = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => 'Dashboard', 'url' => route('book.dashboard')],
            ['name' => 'Books']
        ];

        return view('book::books.showBooks', [
            'books' => $books,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $authors = Author::all();
        $statuses = Book::statuses;
        $breadcrumbs = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => 'Dashboard', 'url' => route('book.dashboard')],
            ['name' => 'Books', 'url' => route('books.show')],
            ['name' => 'New Book']

        ];
        return view('book::books.addBook', [
            'authors' => $authors,
            'statuses' => $statuses,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $book = Book::create($request->all());

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image)
                $book->addMedia($image)->toMediaCollection('images');
        }

        return redirect()->route('books.show')->with('success', 'Book added successfully!');
    }

    // Show the specified resource.
    public function show($id) {}

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $statuses = Book::statuses;
        $authors = Author::all();
        $breadcrumbs = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => 'Dashboard', 'url' => route('book.dashboard')],
            ['name' => 'Books', 'url' => route('books.show')],
            ['name' => 'Edit Book']

        ];
        return view('book::books.editBook', [
            'book' => $book,
            'statuses' => $statuses,
            'authors' => $authors,
            'breadcrumbs' => $breadcrumbs
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

        if ($request->hasFile('image')) {

            $books->clearMediaCollection('images'); // all media in the images collection will be deleted

            $books->addMediaFromRequest('image')->toMediaCollection('images');
        }

        $books->save();

        return redirect()->route('books.show')->with('success', 'Book updated successfully!');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $book = Book::find($id);

        if ($book) {
            $book->delete();
            return response()->json(['success' => 'Book deleted successfully.']);
        } else {
            return response()->json(['error' => 'Book not found.'], 404);
        }
    }
}
