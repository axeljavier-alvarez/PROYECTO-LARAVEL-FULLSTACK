<?php

namespace App\Livewire;

use Livewire\Component;

class CourseStatus extends Component
{

    public $course;
    public $lesson;

    public $current;
    public function render()
    {
        return view('livewire.course-status');
    }
}
