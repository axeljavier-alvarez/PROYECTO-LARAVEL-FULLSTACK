<x-app-layout>
    <x-container class="mt-8">
        @livewire('course-status', [
        'course'=>$course,
        'sections' => $sections->toArray(),
        'lesson'=>$lesson,
        'current' => $users,

        ], )
    </x-container>

</x-app-layout>
