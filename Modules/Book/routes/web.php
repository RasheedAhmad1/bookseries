<?php

use Illuminate\Support\Facades\Route;
use Modules\Book\App\Http\Controllers\BookController;
use Modules\Book\App\Http\Controllers\AuthorController;

// Route::group([], function () {
//     Route::resource('/book', BookController::class)->names('book');
//     Route::resource('/books', function() {
//         return view('book::books')->name('book');
//     });
// });

// Author routes
Route::get('authors', [AuthorController::class, 'index'])->name('authors.show');
Route::get('addauthor', [AuthorController::class, 'create'])->name('author.create');
Route::post('storeauthor', [AuthorController::class, 'store'])->name('author.store');
Route::get('editauthor/{id}', [AuthorController::class, 'edit'])->name('author.edit');
Route::post('updateauthor/{id}', [AuthorController::class, 'update'])->name('author.update');
Route::get('deleteauthor/{id}', [AuthorController::class, 'destroy'])->name('author.delete');

// Book routes
Route::get('books', [BookController::class, 'index'])->name('books.show');
Route::get('addbook', [BookController::class, 'create'])->name('book.create');
Route::post('storebook', [BookController::class, 'store'])->name('book.store');
Route::get('editbook/{id}', [BookController::class, 'edit'])->name('book.edit');
Route::post('updatebook/{id}', [BookController::class, 'update'])->name('book.update');
Route::get('deletebook/{id}', [BookController::class, 'destroy'])->name('book.delete');
