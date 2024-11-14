<?php

use Illuminate\Support\Facades\Route;
use Modules\Author\App\Http\Controllers\AuthorController;

// Author routes
Route::get('authors', [AuthorController::class, 'index'])->name('authors.show');
Route::get('create-author', [AuthorController::class, 'create'])->name('author.create');
Route::post('store-author', [AuthorController::class, 'store'])->name('author.store');
Route::get('edit-author/{id}', [AuthorController::class, 'edit'])->name('author.edit');
Route::post('update-author/{id}', [AuthorController::class, 'update'])->name('author.update');
Route::DELETE('delete-author/{id}', [AuthorController::class, 'destroy'])->name('author.delete');

// Route::delete('/delete-author/{id}', [AuthorController::class, 'destroy'])->name('author.delete');
// Route::delete('/delete-author/{id}', [AuthorController::class, 'destroy'])->name('author.delete');