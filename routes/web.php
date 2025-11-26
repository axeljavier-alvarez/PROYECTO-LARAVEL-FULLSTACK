<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
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

Route::get('cart', [CartController::class, 'index'])
->name('cart.index');


Route::get('prueba', function(){

    Cart::instance('shopping');
    return Cart::content();

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
