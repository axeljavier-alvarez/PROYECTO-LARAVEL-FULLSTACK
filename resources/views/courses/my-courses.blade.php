<x-app-layout>

    <x-container width="5xl" class="mt-12">
        <ul class="grid grid-cols-1 sm:grid-cols-2 
        md:grid-cols-3 lg:grid-cols-4 gap-6">

            @forelse ($courses as $course)
                <li>
                    <a href="{{ route('courses.status', $course) }}" class="block">
                        <figure>
                            <img class="aspect-vide w-full rounded-lg object-cover object-center" src="{{ $course->image }}" alt="">
                        </figure>

                        <p class="truncate mt-1">
                            {{ $course->title }}
                        </p>
                    </a>
                </li>
               
            @empty

            <li class="col-span-1 sm:col-span-2 md:col-span-3 lg:col-span-4">
                <div class="card flex flex-col items-center text-center">

                    <figure>
                <img src="{{ asset('img/mensajes/vacio-uno.png') }}" alt="Gracias por tu compra"
                 class="w-80">
                    </figure>

                    <p class="my-2 text-center">
                        Parece que aún no tienes cursos matriculados
                    </p>

                    <div class="flex jusity-center">
                        <a href="{{ route('courses.index') }}" class="btn btn-blue ">
                            Comprar un curso
                        </a>
                    </div>
                
                </div>
            </li>
                
            @endforelse
        </ul>
    </x-container>
</x-app-layout>