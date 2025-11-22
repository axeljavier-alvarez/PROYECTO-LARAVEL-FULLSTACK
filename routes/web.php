<?php

use Illuminate\Support\Facades\Route;
use App\Models\Lesson;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

Route::get('/', function () {
    return view('welcome');
});

Route::get('prueba', function () {

    $lesson = Lesson::find(1);

    if (!$lesson) {
        return "La lección no existe";
    }

    // Si es URL de YouTube
    if ($lesson->platform == 2) {

        // Regex para extraer el ID del video de YouTube
        $patron = '%^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=))([\w\-]{10,12})%';

        preg_match($patron, $lesson->video_original_name, $matches);

        // Si se extrajo correctamente el ID
        if (isset($matches[1])) {

            $videoId = $matches[1];

            // video_path será el ID del video
            $lesson->video_path = $videoId;

            // Miniatura de YouTube (la calidad media)
            $lesson->image_path = "https://img.youtube.com/vi/{$videoId}/mqdefault.jpg";

            // Duración por defecto ya que no usas API
            $lesson->duration = 1000;

            // Marcamos como procesado
            $lesson->is_processed = true;

            $lesson->save();

            return "Lección de YouTube procesada correctamente";
        } else {
            return "No se pudo extraer el ID del video de YouTube";
        }

    } else {

        // Si el video es LOCAL (platform = 1), estableces valores por defecto
        $lesson->duration = 1000;
        $lesson->image_path = "courses/image/OOypdXH2we3xBEeQBMuWbPduoUok88VpC1Seh0bI.jpg";
        $lesson->is_processed = true;
        $lesson->save();

        return "Lección local marcada como procesada";
    }
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
