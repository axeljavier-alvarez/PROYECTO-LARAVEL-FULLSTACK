<?php 

namespace App\Listeners\VideoUploaded;

use App\Events\VideoUploaded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProcessLessonVideo /* implements ShouldQueue */ 
{
    /**
     * Create the event listener.
     */
    public function __construct() 
    {
        // Constructor vacío (puedes agregar lógica si es necesario)
    }

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

        // PLATFORM = 2 → YouTube
        if ($lesson->platform == 2) {
            // Regex para extraer ID de YouTube
            $patron = '%^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=))([\w\-]{10,12})%';
            preg_match($patron, $lesson->video_original_name, $matches);

            if (isset($matches[1])) {
                $videoId = $matches[1];

                // Guardar ID como ruta
                $lesson->video_path = $videoId;

                // Miniatura de YouTube
                $lesson->image_path = "https://img.youtube.com/vi/{$videoId}/mqdefault.jpg";

                // Valor temporal (sin API YouTube)
                $lesson->duration = 1000;
                $lesson->is_processed = true;
                $lesson->save();

                \Log::info("ProcessLessonVideo: Lección YouTube procesada correctamente. ID: {$videoId}");
            } else {
                \Log::error("ProcessLessonVideo: No se pudo extraer el ID de YouTube para la lección {$lesson->id}");
            }
            return; // No retorna valores, solo termina
        }

        // PLATFORM = 1 → Video local
        // Si el video es local, establece valores por defecto
        $lesson->duration = 1000;
        $lesson->image_path = "courses/image/laravel.jpg";
        $lesson->is_processed = true;
        $lesson->save();

        \Log::info("ProcessLessonVideo: Lección local procesada correctamente.");
    }
}