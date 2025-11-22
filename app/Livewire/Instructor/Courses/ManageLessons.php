<?php

namespace App\Livewire\Instructor\Courses;
use App\Events\VideoUploaded;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Lesson;
use App\Rules\UniqueLessonCourse;

class ManageLessons extends Component
{
    use WithFileUploads;

    public $section;
    public $lessons;

    public $orderLessons;
    public $video, $url;

    public $lessonCreate = [
        'open' => false,
        'name' => null,
        // 'slug' => null,
        // 1 video y 2 youtube
        'platform' => 1,
        // 'video_patch'=> null,
        'video_original_name' => null,
    ];

    public $lessonEdit = [
        'id'=>null,
        'name'=>null
    ];

    public function getLessons()
    {
       $this->lessons=Lesson::where('section_id', $this->section->id)
       ->orderBy('id', 'asc')
       ->get();
    }

    public function rules()
    {
        $rules = [
            'lessonCreate.name' => ['required', new UniqueLessonCourse($this->section->course_id)],
            'lessonCreate.platform' => 'required',

        ];

        if($this->lessonCreate['platform']==1){
            $rules['video'] = 'required|mimes:mp4,mov,avi,wmv,flv,3gp';
        } else {
            $rules['url'] = [
                'required',
                'regex:/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:watch\?v=|embed\/|v\/|shorts\/)|youtu\.be\/)([\w\-]{10,12})/'
            ];
}

        return $rules;
    }

    public function update()
    {
        $this->validate([
            'lessonEdit.name' => ['required']
        ]);
        Lesson::find($this->lessonEdit['id'])->update([

            'name'=> $this->lessonEdit['name']
        ]);




        $this->reset('lessonEdit');

        $this->getLessons();
    }


    public function destroy($lessonId)
    {
        $lesson = Lesson::find($lessonId);
        $lesson->delete();

        $this->getLessons();
        $this->dispatch('refreshOrderLessons')->to(\App\Livewire\Instructor\Courses\ManageSections::class);

    }



    public function store()
{
    $this->validate();

    if ($this->lessonCreate['platform'] == 1) {

        // Guardar video primero
        $videoPath = $this->video->store('courses/lessons');

        // Guardar nombre original
        $this->lessonCreate['video_original_name'] = $this->video->getClientOriginalName();

        // Crear lesson
        $lesson = $this->section->lessons()->create([
            'name' => $this->lessonCreate['name'],
            'platform' => 1,
            'video_original_name' => $this->lessonCreate['video_original_name'],
            'video_path' => $videoPath,
        ]);

                VideoUploaded::dispatch($lesson);


    } else {

        // Guardar lección de Youtube
        $lesson = $this->section->lessons()->create([
            'name' => $this->lessonCreate['name'],
            'platform' => 2,
            'video_original_name' => $this->url,
        ]);

        // nueva linea 1
        VideoUploaded::dispatch($lesson);
    }

    // Reset limpio
    $this->reset(['video', 'url', 'lessonCreate']);
    $this->lessonCreate['open'] = false;
    $this->lessonCreate['platform'] = 1;


    $this->getLessons();

    // $this->dispatch('refreshOrderLessons');
    //$this->dispatchUp('refreshOrderLessons');
    $this->dispatch('refreshOrderLessons')->to(\App\Livewire\Instructor\Courses\ManageSections::class);

}

    public function edit($lessonId){
        $lesson = Lesson::find($lessonId);
        $this->lessonEdit =[
            'id'=>$lesson->id,
            'name'=>$lesson->name
        ];
    }





    public function render()
    {
        return view('livewire.instructor.courses.manage-lessons');
    }
}
