<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PermissionController;
use Illuminate\Support\Facades\Route;

Route::get('', function(){

    return view('admin.dashboard');

})
->middleware('can:access_dashboard')
->name('dashboard');

// nueva ruta
Route::resource('users', UserController::class)
->middleware('can:manage_users');
// ruta para roles
Route::resource('roles', RoleController::class)
->middleware('can:manage_roles');

Route::resource('permissions', PermissionController::class)
->middleware('can:manage_permissions');


