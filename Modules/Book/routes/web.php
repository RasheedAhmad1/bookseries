<?php

use Illuminate\Support\Facades\Route;
use Modules\Book\App\Http\Controllers\BookController;

// Book dashboard route
Route::prefix('books')->middleware('auth')->group(function () {
    Route::get('/dashboard', [BookController::class, 'dashboard'])->name('books.dashboard');
});

// Book routes
Route::get('books', [BookController::class, 'index'])->name('books.index');
Route::get('create', [BookController::class, 'create'])->name('book.create');
Route::post('storebook', [BookController::class, 'store'])->name('book.store');
Route::get('editbook/{id}', [BookController::class, 'edit'])->name('book.edit');
Route::get('showbook/{id}', [BookController::class, 'show'])->name('book.show');
Route::post('updatebook/{id}', [BookController::class, 'update'])->name('book.update');
Route::get('deletebook/{id}', [BookController::class, 'destroy'])->name('book.delete');

// Delete Book route for Modal
Route::delete('/delete-book/{id}', [BookController::class, 'destroy'])->name('delete.book');
