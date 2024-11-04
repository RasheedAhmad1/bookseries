<?php

use Illuminate\Support\Facades\Route;
use Modules\Comment\App\Http\Controllers\CommentController;

// Comment dashboard route
Route::get('comment/dashboard', [CommentController::class, 'index'])->name('comment.dashboard');

// Comment routes
Route::get('comments', [CommentController::class, 'showComments'])->name('comments.show');
Route::get('addcomment', [CommentController::class, 'create'])->name('comment.create');
Route::post('storecomment', [CommentController::class, 'store'])->name('comment.store');
Route::get('editcomment/{id}', [CommentController::class, 'edit'])->name('comment.edit');
Route::post('updatecomment/{id}', [CommentController::class, 'update'])->name('comment.update');
Route::get('deletecomment/{id}', [CommentController::class, 'destroy'])->name('comment.delete');

// Delete Comment route for Modal
// Route::delete('/delete-comment/{id}', [CommentController::class, 'destroy'])->name('delete.comment');
