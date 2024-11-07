<?php

use Illuminate\Support\Facades\Route;

use Modules\Setting\App\Http\Controllers\UserController;
use Modules\Setting\App\Http\Controllers\SettingController;
use Modules\Setting\App\Http\Controllers\RoleController;
use Modules\Setting\App\Http\Controllers\PermissionController;

// Route::group(['middleware' => ['auth']], function () {
//     Route::resource('settings', SettingController::class);
//     Route::resource('roles', RoleController::class);
//     Route::resource('users', UserController::class);
// });

// Users routes
Route::prefix('users')->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');          // List all users
    Route::get('/create', [UserController::class, 'create'])->name('user.create');   // Create a users
    Route::post('/store', [UserController::class, 'store'])->name('user.store');      // Store a user
    Route::get('/show', [UserController::class, 'show'])->name('user.show');         // Show a user
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('user.edit');  // Edit a user
    Route::post('/update-user/{id}', [UserController::class, 'update'])->name('user.update');   // Update user
    Route::delete('/delete-user/{id}', [UserController::class, 'destroy'])->name('user.delete');
});

// Settings routes
Route::prefix('settings')->middleware('auth')->group(function () {
    Route::get('/', [SettingController::class, 'index'])->name('settings.index');          // View all settings
    Route::post('/update', [SettingController::class, 'update'])->name('settings.update'); // Update settings
});

// Roles routes
Route::prefix('roles')->middleware('auth')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('roles.index');              // List all roles
    Route::get('/create', [RoleController::class, 'create'])->name('role.create');       // Show form to create a role
    Route::post('/', [RoleController::class, 'store'])->name('role.store');              // Store new role
    Route::get('/show', [UserController::class, 'show'])->name('role.show');             // Show a user
    Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');        // Show form to edit role
    Route::post('/update/{id}', [RoleController::class, 'update'])->name('role.update'); // Update role
    Route::delete('/delete/{id}', [RoleController::class, 'destroy'])->name('role.destroy');    // Delete role
});

// Permissions routes
Route::prefix('permissions')->middleware('auth')->group(function () {
    Route::get('/', [PermissionController::class, 'index'])->name('permissions.index');                    // List all permissions
    Route::get('/create', [PermissionController::class, 'create'])->name('permissions.create');            // Show form to create permission
    Route::post('/', [PermissionController::class, 'store'])->name('permissions.store');                   // Store new permission
    Route::get('/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');     // Show form to edit permission
    Route::put('/{permission}', [PermissionController::class, 'update'])->name('permissions.update');      // Update permission
    Route::delete('/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy'); // Delete permission
});
