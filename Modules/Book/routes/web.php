<?php

use Illuminate\Support\Facades\Route;
use Modules\Book\App\Http\Controllers\BookController;
use Modules\Book\App\Http\Controllers\UserController;

Route::group([], function () {
    Route::resource('/book', BookController::class)->names('book');
    // Route::resource('/books', function() {
    //     return view('book::books')->name('book');
    // });
});

// Route::get('/books', function () {
//     return view('book::books');
// });
// Route::get('/user/{id}', [UserController::class, 'index']);
// Route::get('/createuser', [UserController::class, 'index']);

// Book routes
Route::get('books', [BookController::class, 'showBooks'])->name('books');
Route::get('addbook', [BookController::class, 'create']);
Route::post('storebook', [BookController::class, 'store']);
Route::get('editbook/{id}', [BookController::class, 'edit']);
Route::post('updatebook/{id}', [BookController::class, 'update'])->name('updatebook');
Route::get('deletebook/{id}', [BookController::class, 'destroy'])->name('deletebook');
