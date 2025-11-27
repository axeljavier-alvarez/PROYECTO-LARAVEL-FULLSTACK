<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


use App\Models\Lesson;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use App\Models\Course;
use CodersFree\Shoppingcart\Facades\Cart;


/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [WelcomeController::class, 'index'])
->name('welcome');

Route::get('courses', [
    CourseController::class, 'index'
])->name('courses.index');

Route::get('courses/{course}', [CourseController::class, 'show'
])->name('courses.show');

Route::get('courses-status/{course}', [
    CourseController::class, 'status'
])->name('courses.status');

Route::get('cart', [CartController::class, 'index'])
->name('cart.index');

Route::get('checkout', [CartController::class, 'checkout'])
->name('cart.checkout');

/* Route::get('prueba', function(){

    return auth()->user()->courses_enrolled;

}); */

Route::get('prueba', function() {
    // return Auth::user()?->courses_enrolled->contains(8) ?? 'No hay usuario autenticado';

    // dd(auth()->user()->courses_enrolled->contains(8));
});







// Route::get('prueba', function () {
//     $course = Course::first();
//     $sections = $course->sections()
//         ->with([
//             'lessons' => function($query) {
//                 $query->orderBy('position', 'asc');
//             }
//         ])
//         ->get();

//     $orderLessons = $sections->pluck('lessons')
//         ->collapse()
//         ->pluck('id');

//     return $orderLessons->search(7) + 1;

// });


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
