<x-app-layout>
    <x-container class="mt-8">
        @livewire('course-status', [
            'course' => $course,
            'sections' => $sections->toArray(),
            'lessons' => $lessons,  // TODOS los ids de las lecciones
            'current' => $lesson,               // la lección actual
        ])
    </x-container>
</x-app-layout>
