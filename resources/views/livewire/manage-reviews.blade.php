<div>
    <div class="grid grid-cols-4 gap-6 mt-5">
        <div class="col-span-1">
            <p class="text-6xl font-bold text-center">
                {{ $course->rating }}
            </p>

            <x-stars class="justify-center" rating="{{ $course->rating }}"/>

                <p class="text-lg text-center">
                    Valoraciones
                </p>
        </div>

        <div class="col-span-3">
            <ul>
                @for($i = 5; $i >= 1; $i--) 
                <li class="flex items-center">
                    <x-progress-bar :width="round($course->reviews->where('rating', $i)->count() * 100 / $course->reviews->count(), 2)" class="flex-1"/>

                    <x-stars rating="{{ $i }}" class="ml-4 mr-2"/>

                    <span class="w-16">
                        {{ round($course->reviews->where('rating', $i)->count() * 100 / $course->reviews->count(), 2) }} %
                    </span>
                </li>
                @endfor
            </ul>
        </div>

    </div>
    {{-- <x-stars rating="3.2" size="xl" /> --}}
</div>
