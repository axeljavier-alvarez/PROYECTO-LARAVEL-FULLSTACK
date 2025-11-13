<?php

namespace App\Livewire\Instructor\Courses;

use Livewire\Component;
use Livewire\WithFileUploads;

class PromotionalVideo extends Component
{
    // subir imagenes, videos

    use WithFileUploads;

    // viaja de video-blade y se almacena aca
    public $course;

    // almacenado el video que seleccionaremos
    public $video;
    
    public function render()
    {
        return view('livewire.instructor.courses.promotional-video');
    }
}
