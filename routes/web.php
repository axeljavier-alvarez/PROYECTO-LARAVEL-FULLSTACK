<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Página principal
Route::get('/', [WelcomeController::class, 'index'])
    ->name('welcome');

// Cursos
Route::get('courses', [CourseController::class, 'index'])
    ->name('courses.index');

Route::get('courses/{course}', [CourseController::class, 'show'])
    ->name('courses.show');

Route::get('courses-status/{course}', [CourseController::class, 'status'])
    ->name('courses.status');

// Carrito
Route::get('cart', [CartController::class, 'index'])
    ->name('cart.index');

// Checkout
Route::get('checkout', [CheckoutController::class, 'index'])
    ->name('checkout.index');

// Rutas de prueba (temporal)
// Route::get('prueba', function() {
//     return auth()->user()?->courses_enrolled->contains(8) ?? 'No hay usuario autenticado';
// });
