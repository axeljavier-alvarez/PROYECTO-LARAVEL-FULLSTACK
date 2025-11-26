<?php

namespace App\Livewire;
use App\Models\Category;
use App\Models\Level;
use App\Models\Course;
use App\Enums\CourseStatus;
use Livewire\Component;
use Livewire\WithPagination;

class CourseFilter extends Component
{

    use WithPagination;

    public $categories;
    public $levels;

    public $selectedCategories = [];

    public $selectedLevels = [];

    public $selectedPrices = [];

    public $search;

    public function updatedSearch()
    {
        // dd($this->search);
        $this->resetPage();
    }

    public function mount()
    {
        $this->categories = Category::all();
        $this->levels = Level::all();
    }

    public function render()
    {
        $courses = Course::where('status', CourseStatus::PUBLICADO)
        ->when($this->selectedCategories, function($query){
        //     $query->whereHas('category', function($query){
        //     $query->whereIn('id', $this->selectedCategories);
        // });
        $query->whereIn('category_id', $this->selectedCategories);

        })



        ->when($this->selectedLevels, function($query){
            $query->whereIn('level_id', $this->selectedLevels);
        })

        ->when($this->selectedPrices, function ($query) {

            // Si eligió solo un tipo de precio
            if (count($this->selectedPrices) == 1) {

                if ($this->selectedPrices[0] == 'free') {
                    // Cursos gratis (value = 0)
                    $query->whereHas('price', function ($q) {
                        $q->where('value', 0);
                    });

                } else {
                    // Cursos premium (value > 0)
                    $query->whereHas('price', function ($q) {
                        $q->where('value', '>', 0);
                    });
                }
            }
        })

        -> when($this->search, function($query){
            $query->where('title', 'LIKE', '%' . $this->search . '%');
        })




        ->paginate(8);
        return view('livewire.course-filter', compact('courses'));
    }
}
