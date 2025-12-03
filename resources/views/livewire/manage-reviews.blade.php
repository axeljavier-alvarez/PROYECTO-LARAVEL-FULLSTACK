<div>
    <div class="grid grid-cols-4 gap-6 mb-8 mt-8">

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
            @php
                $totalReviews = $course->reviews->count();
            @endphp

            <ul>
                @for($i = 5; $i >= 1; $i--)
                    @php
                        $count = $course->reviews->where('rating', $i)->count();
                        $percent = $totalReviews > 0 ? round($count * 100 / $totalReviews, 2) : 0;
                    @endphp

                    <li class="flex items-center">
                        <x-progress-bar :width="$percent" class="flex-1"/>

                        <x-stars rating="{{ $i }}" class="ml-4 mr-2"/>

                        <span class="w-16">
                            {{ $percent }} %
                        </span>
                    </li>
                @endfor
            </ul>
        </div>

    </div>

    <ul class="space-y-6">
        @foreach ($reviews as $review)
        <li class="flex space-x-8">
            <figure class="shrink-0">
                <img
                    class="w-12 h-12 object-cover object-center rounded-full" 
                    src="{{ $review->user->profile_photo_url }}" 
                    alt="">
            </figure>

            <div class="flex-1">
                <p class="font-semibold">
                    {{ $review->user->name }}
                </p>

                <div class="flex space-x-2 items-center">
                    <x-stars rating="{{ $review->rating }}" class="inline"/>
                    <p class="text-sm">
                        {{ $review->created_at->diffForHumans() }}
                    </p>
                </div>

                <div>
                    {{ $review->comment }}
                </div>
            </div>

            <div class="shrink-0">
                <x-dropdown>
                    <x-slot name="trigger">
                        <button>
                            <i class="fas fa-ellipsis-v">

                            </i>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link>
                            Editar
                        </ x-dropdown-link>  

                        <x-dropdown-link>
                            Eliminar
                        </ x-dropdown-link>  

                    </x-slot>
                </x-dropdown>
            </div>

        </li>
        @endforeach
    </ul>
</div>
