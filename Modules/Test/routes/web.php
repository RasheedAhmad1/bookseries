<?php

use Illuminate\Support\Facades\Route;
use Modules\Test\App\Http\Controllers\TestController;
use Modules\Book\App\Http\Controllers\BookController;

// Test dashboard route
Route::get('book/dashboard', [BookController::class, 'index'])->name('book.dashboard');

// Test routes
Route::get('tests', [TestController::class, 'index'])->name('tests.show');
Route::get('addtest', [TestController::class, 'create'])->name('test.create');
Route::post('storetest', [TestController::class, 'store'])->name('test.store');
Route::get('edittest/{id}', [TestController::class, 'edit'])->name('test.edit');
Route::post('updatetest/{id}', [TestController::class, 'update'])->name('test.update');
Route::get('deletetest/{id}', [TestController::class, 'destroy'])->name('test.delete');
