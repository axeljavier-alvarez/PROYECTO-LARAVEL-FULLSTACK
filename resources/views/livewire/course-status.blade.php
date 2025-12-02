<div>

    @push('css')
    <link rel="stylesheet" href="https://cdn.plyr.io/3.8.3/plyr.css" />
    @endpush

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="col-span-1 lg:col-span-2">

        <div wire:ignore>


        @if ($current->platform == 1)

        <video id="player" playsinline controls data-poster="{{ $current->image }}">
            <source src="{{ Storage::url($current->video_path) }}" type="video/mp4">
        </video>

        @else
        {{-- <iframe class="w-full aspect-video" 
        src="https://www.youtube.com/embed/{{ $current->video_path }}" 
        frameborder="0" allow="accelerometer; autoplay; clipboard-write; 
        encrypted-media; gyroscope; picture-in-picture; web-share" 
        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
        </iframe> --}}


        <div class="plyr__video-embed" id="player">
            <iframe
                src="https://www.youtube.com/embed/{{ $current->video_path }}"
                allowfullscreen
                allowtransparency
                allow="autoplay"
            ></iframe>
        </div>

        @endif

        <h1 class="text-3xl font-semibold mt-4">
           {{ $lessons->pluck('id')->search($current->id) + 1 }}. {{ $current->name }}
        </h1>

        @if ($current->description)
            <p class="text-gray-600 mt-2">
                {{ $current->description }}
            </p>
        @endif
        </div>
        

        @auth
        <div class="flex items-center space-x-2">
            <x-toggle wire:model="completed" label="Marcar esta unidad como completada" />
        </div>
        @endauth


        <div class="bg-white shadow-xl rounded-lg px-6 py-4 mt-2">
            <div class="flex justify-between">
                <button  wire:click="previousLesson()" class="font-bold">
                    Tema anterior
                </button>
                <button wire:click="nextLesson()" href="" class="font-bold">
                    Siguiente tema
                </button>
            </div>
        </div>

    </div>
    <aside class="col-span-1">
        <div class="card">
            <h1 class="text-2xl leading-8 text-center mb-4">
                <a class="hover:text-blue-600" href="{{ route('courses.show', $course) }}">
                    {{ $course->title }}
                </a>
            </h1>

            {{-- {{ Informacion del profeso }} --}}
            <div class="flex items-center">
                <figure class="mr-4 shrink-0">
                    <img class="w-12 h-12 object-cover rounded-full" src="{{ $course->teacher->profile_photo_url }}" alt="">
                </figure>

                <div class="flex-1">
                    <p>
                        {{ $course->teacher->name }}
                    </p>
                </div>


            </div>

            {{-- {{ Avance }} --}}
            <div class="mt-2">
                    <p class="text-gray-600 text-sm">
                        {{ $advance }}% completado
                    </p>

                    <div class="relative pt-1">
                        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                            <div
                                style="width:{{ $advance }}"
                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500">
                            </div>
                        </div>
                    </div>
            </div>

            {{-- {{ Secciones }} --}}
            <ul class="space-y-4 text-gray-600">
                @foreach ( $sections as $section )
                <li x-data="{open: '{{ $section['id'] == $current->section_id }}'}">
                    <button x-on:click="open =!open" class="text-left flex justify-between">
                        <span>
                            {{ $section['name'] }}
                        </span>

                        <i class="mt-1 fas fa-angle-down" x-bind:class="open ? 'fa-angle-up' : 'fa-angle-down'">

                        </i>

                    </button>

                    <ul class="space-y-1 mt-2" x-show="open" x-cloak>
                        @foreach ($section['lessons'] as $lesson)
                        <li>
                            <a href="{{ route('courses.status', [$course, $lesson['slug']]) }}" class="w-full flex">
                                <i class="fa-solid {{ $lesson['id'] == $current->id ? 'fa-circle-dot' : 'fa-circle' }} mt-1 mr-2
                                    {{ DB::table('course_lesson_user')
                                        ->where('lesson_id', $lesson['id'])
                                        ->where('user_id', auth()->id())
                                        ->where('completed', 1)
                                        ->count() ? 'text-yellow-500' : '' }}">
                                </i>
                                <span>
                                    {{ $lessons->pluck('id')->search($lesson['id'] ) +1 }} .
                                    {{ $lesson['name'] }}
                                </span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
        </div>
    </aside>
</div>

@push('js')
<script src="https://cdn.plyr.io/3.8.3/plyr.js"></script>
<script>
      const player = new Plyr('#player');

      player.on('ready', event=>{
        player.play();
      });

      player.on('ended', event=>{

        @this.call('completedLesson')
        // player.play();
      })


</script>
    
@endpush
</div>
