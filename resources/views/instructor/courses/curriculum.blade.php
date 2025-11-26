<x-instructor-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Curso: {{ $course->title }}
        </h2>
    </x-slot>

    <x-container class="py-10">

        <x-instructor.course-sidebar :course="$course">

            @livewire(
                'instructor.courses.manage-sections',
                ['course' => $course],
                key('manage-sections' . $course->id)
            )

        </x-instructor.course-sidebar>




    </x-container>

    @push('js')
<script src="{{ asset('vendor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

    @endpush

</x-instructor-layout>
