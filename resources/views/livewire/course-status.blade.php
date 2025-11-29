<div>
<div class="grid grid-cols-3 gap-8">
    <div class="col-span-2">

        <iframe class="w-full aspect-video" src="https://www.youtube.com/embed/{{ $current->video_path }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

        <h1 class="text-3xl font-semibold mt-4">
           {{ $lessons->search($current->id) + 1 }}. {{ $current->name }}
        </h1>

        @if ($current->description)
            <p class="text-gray-600 mt-2">
                {{ $current->description }}
            </p>
        @endif

    </div>
    <div class="col-span-1">

    </div>
</div>
</div>
