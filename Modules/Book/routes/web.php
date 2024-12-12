<?php

use Illuminate\Support\Facades\Route;
use Modules\Book\App\Http\Controllers\UnitController;
use Modules\Book\App\Http\Controllers\BookController;
use Modules\Book\App\Http\Controllers\SectionController;
use Modules\Book\App\Http\Controllers\QuestionController;

// Book dashboard route
Route::prefix('books')->middleware('auth')->group(function () {
    Route::get('/dashboard', [BookController::class, 'dashboard'])->name('books.dashboard');
});


// Book routes
Route::get('books', [BookController::class, 'index'])->name('books.index');
Route::get('create-book', [BookController::class, 'create'])->name('book.create');
Route::post('store-book', [BookController::class, 'store'])->name('book.store');
Route::get('edit-book/{id}', [BookController::class, 'edit'])->name('book.edit');
Route::post('update-book/{id}', [BookController::class, 'update'])->name('book.update');
Route::get('showbook/{id}', [BookController::class, 'show'])->name('book.show');
// Route for uploading ckeditor images
Route::post('book/upload-image', [BookController::class, 'uploadImage'])->name('image.upload');
// Delete Book route with Modal
Route::delete('delete-book/{id}', [BookController::class, 'destroy'])->name('delete.book');


//Sections Routes
Route::get('sections/{id}', [SectionController::class, 'index'])->name('sections.index');
Route::get('create-section/{id}', [SectionController::class, 'create'])->name('section.create');
Route::post('store-section/{id}', [sectionController::class, 'store'])->name('section.store');
Route::get('edit-section/{id}', [sectionController::class, 'edit'])->name('section.edit');
Route::post('update-section/{id}', [SectionController::class, 'update'])->name('section.update');
// Route for uploading ckeditor images
Route::post('section/upload-image', [sectionController::class, 'uploadImage'])->name('image_section.upload');
// Delete Section route with Modal
Route::get('delete-section/{id}', [SectionController::class, 'destroy'])->name('delete.section');


//Units Routes
Route::get('units/{id}', [UnitController::class, 'index'])->name('units.index');
Route::get('create-unit/{id}', [UnitController::class, 'create'])->name('unit.create');
Route::post('store-unit/{id}', [UnitController::class, 'store'])->name('unit.store');
Route::get('edit-unit/{id}', [UnitController::class, 'edit'])->name('unit.edit');
Route::post('update-unit/{id}', [UnitController::class, 'update'])->name('unit.update');
// Route for uploading ckeditor images
Route::post('unit/upload-image', [UnitController::class, 'uploadImage'])->name('image_unit.upload');
// Delete unit route with Modal
Route::delete('delete-unit/{id}', [UnitController::class, 'destroy'])->name('delete.section');

//Question Routes
Route::get('questions/{id}', [QuestionController::class, 'index'])->name('questions.index');
Route::get('create-question/{id}', [QuestionController::class, 'create'])->name('question.create');
Route::post('store-question/{id}', [QuestionController::class, 'store'])->name('question.store');
Route::get('edit-question/{id}', [QuestionController::class, 'edit'])->name('question.edit');
Route::post('update-question/{id}', [QuestionController::class, 'update'])->name('question.update');
// Route for uploading ckeditor images
Route::post('question/upload-image', [QuestionController::class, 'uploadImage'])->name('image_question.upload');
// Delete unit route with Modal
Route::get('delete-question/{id}', [QuestionController::class, 'destroy'])->name('delete.question');
