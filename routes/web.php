<?php

use Illuminate\Support\Facades\Route;
use App\Models\Lesson;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

Route::get('/', function () {
    return view('welcome');
});

Route::get('prueba', function(){
    $lesson = Lesson::find(1);

    if($lesson->platform == 1){

        $media = FFMpeg::open($lesson->video_path);

    $lesson->duration = $media->getDurationInSeconds();

    $lesson->image_path = "courses/lessons/posters/{$lesson->slug}.jpg";

    //return $lesson->image_path;
    // me retorna esto courses/lessons/posters/leccion-prueba.jpg
    $media->getFrameFromSeconds(1)

    ->export()
    ->save($lesson->image_path);

    $lesson->is_processed = true;

    $lesson->save();


    } else {
       
        $patron = '%^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=))([\w\-]{10,12})%';

        preg_match($patron, $lesson->video_original_name, $matches);


        $lesson->video_path = $matches[1];

        // 12:30 minuto en el que me quede
        $video_fino = Http::get('https://www.googleapis.com/youtube/v3/videos?id=' . $lesson->video_path . '&key=' . config('services.youtube.'));
        $video_info = Http::get('https://www.googleapis.com/youtube/v3/videos?id=' . $matches[1] . '&key=' . config('services.youtube.api_key') . '&part=snippet,contentDetails');

        return $matches[1];


    }

    
    
    // return $media->getDurationInSeconds();
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
