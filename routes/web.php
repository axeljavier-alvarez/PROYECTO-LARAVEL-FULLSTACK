<?php

use Illuminate\Support\Facades\Route;
use App\Models\Lesson;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

Route::get('/', function () {
    return view('welcome');
});

Route::get('prueba', function () {

    
});

/* No la estoy usando
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
}); */
