<?php

namespace App\Livewire\Instructor\Courses;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Events\VideoUploaded;
use Illuminate\Support\Facades\Storage;
use App\Models\Lesson;
class ManageLessonContent extends Component
{

    use WithFileUploads;
    public $lesson;

    public $editVideo = false;

    public $editDescription = false;

    public $platform = 1, $video, $url;

    public $description;
    public $is_published, $is_preview; 


    public function mount($lesson)
    {
       $this->description = $lesson->description;
       $this->is_published = $lesson->is_published;
       //$this->is_published = false;
       $this->is_preview = $lesson->is_preview;
    }


    public function updated($property, $value)
{
    if (in_array($property, ['is_published', 'is_preview'])) {
        $this->lesson->$property = $value;
        $this->lesson->save();
    }
}



   
public function saveVideo()
{
    // Validación según plataforma
    $rules = [
        'platform' => 'required',
    ];

    if ($this->platform == 1) {
        $rules['video'] = 'required|mimes:mp4,mov,avi,wmv,flv,3gp';
    } else {
        $rules['url'] = [
            'required',
            'regex:/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:watch\?v=|embed\/|v\/|shorts\/)|youtu\.be\/)([\w\-]{10,12})/'
        ];
    }

    $this->validate($rules);

    // Si es video local
    if ($this->platform == 1 && $this->video) {

        // Elimina el archivo anterior si existía
        if ($this->lesson->video_path) {
            Storage::delete($this->lesson->video_path);
        }

        if ($this->lesson->image_path) {
            Storage::delete($this->lesson->image_path);
        }

        $this->lesson->platform = 1;
        $this->lesson->is_processed = false; // seguirá procesando
        $this->lesson->video_original_name = $this->video->getClientOriginalName();
        $this->lesson->video_path = $this->video->store('courses/lessons');
        $this->lesson->save();

        // Dispara evento para procesar el video (FFMpeg, colas, etc.)
        VideoUploaded::dispatch($this->lesson);

    } elseif ($this->platform == 2) {
        // Si es YouTube
        $this->lesson->platform = 2;
        $this->lesson->video_original_name = $this->url;
        $this->lesson->is_processed = true; // YouTube no necesita procesar
        $this->lesson->save();

        VideoUploaded::dispatch($this->lesson);
    }

    // Refresca el modelo para que la vista Livewire se actualice
    $this->lesson->refresh();

    // Reset de variables Livewire
    $this->reset(['editVideo', 'video', 'url']);
}




    public function saveDescription()
{

    $this->validate([
        'description' => 'required'
    ]);

    $this->lesson->description = $this->description;
    $this->lesson->save();

    $this->reset('editDescription');

}



#[On('uploadVideo')]
public function uploadVideo($lessonId)
{
    $lesson = Lesson::find($lessonId);

    if ($this->video) {
        $lesson->video_path = $this->video->store('courses/lessons');
        $lesson->save();

        VideoUploaded::dispatch($lesson);

        $this->reset('video');
    }
}

}
