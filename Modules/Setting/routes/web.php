<?php

use Illuminate\Support\Facades\Route;

use Modules\Setting\App\Http\Controllers\UserController;
use Modules\Setting\App\Http\Controllers\SettingController;
use Modules\Setting\App\Http\Controllers\RoleController;
use Modules\Setting\App\Http\Controllers\PermissionController;
use Modules\Setting\App\Http\Controllers\PrivilegeController;

use App\Http\Controllers\UserPrivilegeController;

// Route::group(['middleware' => ['auth']], function () {
//     Route::resource('settings', SettingController::class);
//     Route::resource('roles', RoleController::class);
//     Route::resource('users', UserController::class);
// });

// Users routes
Route::prefix('users')->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/show', [UserController::class, 'show'])->name('user.show');
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/update-user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/delete-user/{id}', [UserController::class, 'destroy'])->name('user.delete');
});

// Settings routes
Route::prefix('settings')->middleware('auth')->group(function () {
    Route::get('/', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/update', [SettingController::class, 'update'])->name('settings.update');
});

// Roles routes
Route::prefix('roles')->middleware('auth')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/store', [RoleController::class, 'store'])->name('role.store');
    Route::get('/show', [UserController::class, 'show'])->name('role.show');
    Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('/update/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::delete('/delete/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
});

// Privileges routes
Route::prefix('privileges')->middleware('auth')->group(function () {
    Route::get('/', [PrivilegeController::class, 'index'])->name('privileges.index');
    Route::get('/create', [PrivilegeController::class, 'create'])->name('privilege.create');
    Route::post('/store', [PrivilegeController::class, 'store'])->name('privilege.store');
    Route::get('/edit/{id}', [PrivilegeController::class, 'edit'])->name('privilege.edit');
    Route::get('/show/{id}', [PrivilegeController::class, 'show'])->name('privilege.show');
    Route::put('/update/{id}', [PrivilegeController::class, 'update'])->name('privilege.update');
    Route::delete('/delete/{id}', [PrivilegeController::class, 'destroy'])->name('privilege.destroy');
    Route::post('/assign-privilege', [UserPrivilegeController::class, 'assignPrivilege']);
});

// Permissions routes
Route::prefix('permissions')->middleware('auth')->group(function () {
    Route::get('/', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::put('/{permission}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::delete('/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');
});
