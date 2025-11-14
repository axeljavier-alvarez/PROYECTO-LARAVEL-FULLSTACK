<div>

    <h1 class="text-2xl font-semibold">Video promocional</h1>

    <hr class="mt-2 mb-6">

<div class="grid grid-cols-2 gap-6">

        <div class="col-span-1">
            @if($course->video_path)

            @else
            <figure>
                <img class="w-full aspect-video object-cover" src="{{ $course->image }}" alt="{{ $course->title }}">
            </figure>
            @endif
        </div>
        <div class="col-span-1">
            <p class="mb-4">
                Lorem ipsum dolor sit amet, consectetur
            </p>

            <x-progress-indicators wire:model="video"/>

        </div>

    </div>
</div>
