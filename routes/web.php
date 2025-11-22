<?php

use Illuminate\Support\Facades\Route;
use App\Models\Lesson;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use App\Models\Course;

Route::get('/', function () {
    return view('welcome');
});

Route::get('prueba', function () {

    $course = Course::first();

    // Usar QUERY, NO collection
    $sections = $course->sections()
        ->with([
            'lessons' => function($query) {
                $query->orderBy('position', 'asc');
            }
        ])
        ->get();

    // Obtener IDs de todas las lecciones ordenadas
    $orderLessons = $sections->pluck('lessons')
        ->collapse()
        ->pluck('id');

    // Buscar el ID 4 y sumar 1 (posición humana)
    return $orderLessons->search(7) + 1;

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
