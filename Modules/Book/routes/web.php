<?php

use Illuminate\Support\Facades\Route;
use Modules\Book\App\Http\Controllers\BookController;

// Book dashboard route
Route::prefix('books')->middleware('auth')->group(function () {
    Route::get('/dashboard', [BookController::class, 'dashboard'])->name('books.dashboard');
});

// Book routes
Route::get('books', [BookController::class, 'index'])->name('books.show');
Route::get('create-book', [BookController::class, 'create'])->name('book.create');
Route::post('store-book', [BookController::class, 'store'])->name('book.store');
Route::get('edit-book/{id}', [BookController::class, 'edit'])->name('book.edit');
Route::post('update-book/{id}', [BookController::class, 'update'])->name('book.update');

// Route for uploading ckeditor images
Route::post('book/upload-image', [BookController::class, 'uploadImage'])->name('image.upload');


// Delete Book route for Modal
Route::delete('/delete-book/{id}', [BookController::class, 'destroy'])->name('delete.book');
