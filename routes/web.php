<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * Protected Routes
 */
Route::middleware(['auth'])->group(function () {
    // Route::get('/home', [HomeController::class, 'index'])->name('home');

    /*
    // Permission Resource Routes
    Route::resource('permission', PermissionController::class)
        ->middleware([
            'index' => 'permission:ROLE_MANAGEMENT_READ',
            'show' => 'permission:ROLE_MANAGEMENT_VIEW',
            'create' => 'permission:ROLE_MANAGEMENT_CREATE',
            'store' => 'permission:ROLE_MANAGEMENT_CREATE',
            'edit' => 'permission:ROLE_MANAGEMENT_UPDATE',
            'update' => 'permission:ROLE_MANAGEMENT_UPDATE',
            'destroy' => 'permission:ROLE_MANAGEMENT_DELETE',
        ]);


    // Role Resource Routes
    Route::resource('role', RoleController::class)
        ->middleware([
            'index' => 'permission:ROLE_MANAGEMENT_READ',
            'show' => 'permission:ROLE_MANAGEMENT_VIEW',
            'create' => 'permission:ROLE_MANAGEMENT_CREATE',
            'store' => 'permission:ROLE_MANAGEMENT_CREATE',
            'edit' => 'permission:ROLE_MANAGEMENT_UPDATE',
            'update' => 'permission:ROLE_MANAGEMENT_UPDATE',
            'destroy' => 'permission:ROLE_MANAGEMENT_DELETE',
        ]);

    // User Resource Routes
    Route::resource('user', UserController::class)
        ->middleware([
            'index' => 'permission:ROLE_MANAGEMENT_READ',
            'show' => 'permission:ROLE_MANAGEMENT_VIEW',
            'create' => 'permission:ROLE_MANAGEMENT_CREATE',
            'store' => 'permission:ROLE_MANAGEMENT_CREATE',
            'edit' => 'permission:ROLE_MANAGEMENT_UPDATE',
            'update' => 'permission:ROLE_MANAGEMENT_UPDATE',
            'destroy' => 'permission:ROLE_MANAGEMENT_DELETE',
        ]);
    */


});
