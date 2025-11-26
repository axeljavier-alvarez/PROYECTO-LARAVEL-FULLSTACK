<?php

namespace App\Livewire\Instructor\Courses;

use Livewire\Component;
use App\Models\Section;
use App\Models\Lesson;
use Livewire\Attributes\On;

class ManageSections extends Component
{
    public $course;
    public $name;
    public $sections;
    public $currentSectionId;

    public $sectionEdit = [
        'id' => null,
        'name' => null
    ];

    public $sectionPositionCreate = [
       /* '1' => [
            'name' => '45644'
        ],
        '3' => [
            'name' => '45644'
        ]*/
    ];

    public $orderLessons;

    public function mount()
    {
        $this->getSections();
    }


    public function sortSections($order)
{
    foreach ($order as $index => $sectionId) {
        Section::where('id', $sectionId)
            ->update([
                'position' => $index + 1
            ]);
    }

    $this->getSections();
}

    #[On('sortLessons')]
public function sortLessons($sorts, $sectionId)
{
    //dd($sectionId);
    // dd($sorts); // Ahora sí debería salir
    foreach ($sorts as $position => $lessonId) {
        Lesson::find($lessonId)->update([
            'position' => $position + 1,
            'section_id' => $sectionId
        ]);
    }

    $this->getSections();


}

    public function store()
{
    $this->validate([ 'name' => 'required' ]);

    $last = Section::where('course_id', $this->course->id)->max('position');

    $this->course->sections()->create([
        'name' => $this->name,
        'position' => $last + 1
    ]);

    $this->reset('name');
    $this->getSections();
    $this->dispatch('clear-input-section');
}




public function storePosition($sectionId)
{
    $this->validate([
        "sectionPositionCreate.$sectionId.name" => 'required'
    ]);

    $section = Section::find($sectionId);

    Section::where('course_id', $this->course->id)
        ->where('position', '>=', $section->position)
        ->increment('position');

    $new = $this->course->sections()->create([
        'name' => $this->sectionPositionCreate[$sectionId]['name'],
        'position' => $section->position
    ]);

    $this->sectionPositionCreate[$sectionId]['name'] = "";

    // PRIMERO CIERRA EL FORMULARIO
    $this->dispatch('close-form-' . $sectionId);

    // LUEGO REFRESCA LA LISTA
    $this->getSections();
}






    public function edit(Section $section)
    {
        $this->sectionEdit = [
            'id'   => $section->id,
            'name' => $section->name
        ];
    }

    public function update()
    {
        $this->validate([
            'sectionEdit.name' => 'required'
        ]);

        Section::findOrFail($this->sectionEdit['id'])->update([
            'name' => $this->sectionEdit['name'],
        ]);

        $this->reset('sectionEdit');

        $this->getSections();
    }

    public function destroy(Section $section)
    {
        $section->delete();
        $this->getSections();

        $this->dispatch('swal', [
            "icon" => "success",
            "title" => "Eliminado!",
            "text" => "La sección ha sido eliminada",

        ]);
    }


      #[On('refreshOrderLessons')]
    public function getSections()
{
    $this->sections = Section::where('course_id', $this->course->id)
        ->with([
            'lessons' => function($query) {
                $query->orderBy('position', 'asc');
            }
        ])
        ->orderBy('position', 'asc')
        ->get();



        $this->orderLessons = $this->sections
        ->pluck('lessons')
        ->collapse()
        ->pluck('id');


    // GENERA AUTOMÁTICAMENTE LOS CAMPOS PARA CADA SECCIÓN
    foreach ($this->sections as $section) {
        if (!isset($this->sectionPositionCreate[$section->id])) {
            $this->sectionPositionCreate[$section->id] = [
                'name' => ''
            ];
        }
    }
}


    public function render()
    {
        return view('livewire.instructor.courses.manage-sections');
    }
}
