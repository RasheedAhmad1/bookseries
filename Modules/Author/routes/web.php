<?php

use Illuminate\Support\Facades\Route;
use Modules\Author\App\Http\Controllers\AuthorController;

// Author routes
Route::get('authors', [AuthorController::class, 'index'])->name('authors.show');
Route::get('addauthor', [AuthorController::class, 'create'])->name('author.create');
Route::post('storeauthor', [AuthorController::class, 'store'])->name('author.store');
Route::get('editauthor/{id}', [AuthorController::class, 'edit'])->name('author.edit');
Route::post('updateauthor/{id}', [AuthorController::class, 'update'])->name('author.update');
Route::get('deleteauthor/{id}', [AuthorController::class, 'destroy'])->name('author.delete');

// Route::delete('/delete-author/{id}', [AuthorController::class, 'destroy'])->name('author.delete');
// Route::delete('/delete-author/{id}', [AuthorController::class, 'destroy'])->name('author.delete');
