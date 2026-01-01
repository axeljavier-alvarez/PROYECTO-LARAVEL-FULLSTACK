<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('', function(){

    return view('admin.dashboard');

})->name('dashboard');

// nueva ruta
Route::resource('users', UserController::class);
