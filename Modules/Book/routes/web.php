<?php

use Illuminate\Support\Facades\Route;
use Modules\Book\App\Http\Controllers\BookController;
use Modules\Book\App\Http\Controllers\AuthorController;
use Modules\Book\App\Http\Controllers\TestController;

// Route::group([], function () {
//     Route::resource('/book', BookController::class)->names('book');
//     Route::resource('/books', function() {
//         return view('book::books')->name('book');
//     });
// });

// Book routes
Route::get('books', [BookController::class, 'index'])->name('books.show');
Route::get('addbook', [BookController::class, 'create'])->name('book.create');
Route::post('storebook', [BookController::class, 'store'])->name('book.store');
Route::get('editbook/{id}', [BookController::class, 'edit'])->name('book.edit');
Route::post('updatebook/{id}', [BookController::class, 'update'])->name('book.update');
Route::get('deletebook/{id}', [BookController::class, 'destroy'])->name('book.delete');

// Test routes
Route::get('tests', [TestController::class, 'index'])->name('tests.show');
Route::get('addtest', [TestController::class, 'create'])->name('test.create');
Route::post('storetest', [TestController::class, 'store'])->name('test.store');
Route::get('edittest/{id}', [TestController::class, 'edit'])->name('test.edit');
Route::post('updatetest/{id}', [TestController::class, 'update'])->name('test.update');
Route::get('deletetest/{id}', [TestController::class, 'destroy'])->name('test.delete');

// Author routes
Route::get('authors', [AuthorController::class, 'index'])->name('authors.show');
Route::get('addauthor', [AuthorController::class, 'create'])->name('author.create');
Route::post('storeauthor', [AuthorController::class, 'store'])->name('author.store');
Route::get('editauthor/{id}', [AuthorController::class, 'edit'])->name('author.edit');
Route::post('updateauthor/{id}', [AuthorController::class, 'update'])->name('author.update');
Route::get('deleteauthor/{id}', [AuthorController::class, 'destroy'])->name('author.delete');
