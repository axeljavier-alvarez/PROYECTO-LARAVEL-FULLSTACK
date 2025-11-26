<?php

namespace App\Livewire\Instructor\Courses;
use App\Events\VideoUploaded;
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

    
   public function getLessons() {
    $this->lessons = Lesson::where('section_id', $this->section->id)
        ->orderBy('position', 'asc')
        ->get();

    // Esto actualiza el array de IDs para Alpine/Sortable
    $this->orderLessons = $this->lessons->pluck('id')->toArray();
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
    if ($lesson) {
        $lesson->delete();
    }

    // Reassign positions to all remaining lessons
    $this->reorderLessons();

    $this->getLessons();
    $this->dispatch('refreshOrderLessons')->to(ManageSections::class);
}


protected function reorderLessons()
{
    $lessons = Lesson::where('section_id', $this->section->id)
        ->orderBy('position')
        ->get();

    foreach ($lessons as $index => $lesson) {
        $lesson->update([
            'position' => $index + 1
        ]);
    }
}





    public function store()
{
    $this->validate();

    // Determine the new lesson's index based on the count of all lessons
    
    $last = Lesson::where('section_id', $this->section->id)->max('position') ?? 0;
    $newLessonIndex = $last + 1;



    if ($this->lessonCreate['platform'] == 1) {
        $videoPath = $this->video->store('courses/lessons');

        $lesson = $this->section->lessons()->create([
            'name' => $this->lessonCreate['name'],
            'platform' => 1,
            'video_original_name' => $this->lessonCreate['video_original_name'] ?? '',
            'video_path' => $videoPath,
            'position' => $newLessonIndex // Assign position based on global count
        ]);

        VideoUploaded::dispatch($lesson);
    } else {
        $lesson = $this->section->lessons()->create([
            'name' => $this->lessonCreate['name'],
            'platform' => 2,
            'video_original_name' => $this->url,
            'position' => $newLessonIndex // Assign position for YouTube lessons too
        ]);

        VideoUploaded::dispatch($lesson);
    }

    $this->reset(['video', 'url', 'lessonCreate']);
    $this->lessonCreate['open'] = false;

    $this->getLessons();
    $this->dispatch('refreshOrderLessons')->to(ManageSections::class);
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
