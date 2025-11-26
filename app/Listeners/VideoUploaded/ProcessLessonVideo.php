<?php

namespace App\Listeners\VideoUploaded;

use App\Events\VideoUploaded;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class ProcessLessonVideo
{
    /**
     * Handle the event.
     */
    public function handle(VideoUploaded $event): void 
    {
        $lesson = $event->lesson;

        if (!$lesson) {
            \Log::warning("ProcessLessonVideo: la lección no existe.");
            return;
        }

        /*
        |--------------------------------------------------------------------------
        | PLATFORM = 2 → YOUTUBE
        |--------------------------------------------------------------------------
        */
        if ($lesson->platform == 2) {

            // Regex para extraer ID
            $patron = '%^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=))([\w\-]{10,12})%';
            preg_match($patron, $lesson->video_original_name, $matches);

            if (isset($matches[1])) {
                $videoId = $matches[1];

                $lesson->video_path = $videoId; // ID del video

                // Thumbnail externa de YouTube
                $lesson->image_path = "https://img.youtube.com/vi/{$videoId}/mqdefault.jpg";

                // Duración temporal (no usas API)
                $lesson->duration = 1000;
                $lesson->is_processed = true;
                $lesson->save();

                \Log::info("ProcessLessonVideo: Lección YouTube procesada correctamente. ID: {$videoId}");
            } else {
                \Log::error("ProcessLessonVideo: No se pudo extraer ID YT para la lección {$lesson->id}");
            }

            return;
        }

        /*
        |--------------------------------------------------------------------------
        | PLATFORM = 1 → VIDEO LOCAL
        |--------------------------------------------------------------------------
        */
        if ($lesson->platform == 1) {

            $videoPath = $lesson->video_path;

            if (!Storage::disk('public')->exists($videoPath)) {
                \Log::error("ProcessLessonVideo: el archivo local no existe: {$videoPath}");

                // valores de fallback
                $lesson->duration = 1000;
                $lesson->image_path = "courses/image/laravel.jpg";
                $lesson->is_processed = true;
                $lesson->save();
                return;
            }

            /*
            |-----------------------------------------
            | 1) Miniatura real con FFmpeg
            |-----------------------------------------
            */
            $thumbnail = 'courses/lessons/thumbnails/' . uniqid() . '.jpg';

            FFMpeg::fromDisk('public')
                ->open($videoPath)
                ->getFrameFromSeconds(1)
                ->export()
                ->toDisk('public')
                ->save($thumbnail);

            $lesson->image_path = $thumbnail;

            /*
            |-----------------------------------------
            | 2) Duración real con FFprobe
            |-----------------------------------------
            */
            $media = FFMpeg::fromDisk('public')->open($videoPath);
            $duration = $media->getFFProbe()
                              ->format($media->getPathfile())
                              ->get('duration');

            $lesson->duration = intval($duration);
            $lesson->is_processed = true;
            $lesson->save();

            \Log::info("ProcessLessonVideo: Video local procesado correctamente.");
        }
    }
}
