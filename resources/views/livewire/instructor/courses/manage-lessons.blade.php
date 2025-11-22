<div>

    <div
    x-data="{
    destroyLesson(lessonId){
        Swal.fire({
            title: '¿Estás seguro?',
            text: '¡No podrás revertir esto!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, bórralo!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                @this.call('destroy', lessonId);
            }
        });
    }


    }"
    class="mb-6">
        <ul class="space-y-4">
            @foreach ($lessons as $lesson)
            <li wire:key="lesson-{{ $lesson->id }}">
                <div class="bg-white rounded-lg shadow-lg px-6 py-4">

                    @if ($lessonEdit['id']==$lesson->id)

                    <form wire:submit="update">
                        <div class="flex items-center space-x-2">
                            <x-label>
                                Lección:
                            </x-label>

                            <x-input wire:model="lessonEdit.name" class="flex-1"/>
                        </div>

                        <div class="flex justify-end mt-4">
                            <div class="space-x-2">
                                <x-danger-button wire:click="$set('lessonEdit.id', null)">
                                    Cancelar
                                </x-danger-button>
                                <x-button>
                                    Actualizar
                                </x-button>
                            </div>
                        </div>
                    </form>

                    @else
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">

    <!-- Nombre -->
    <h1 class="flex items-center gap-2 truncate cursor-move text-gray-800">
        <i class="fas fa-play-circle text-blue-600"></i>
        Lección {{ $orderLessons->search($lesson->id) + 1 }}:
        {{ $lesson->name }}
    </h1>

    <!-- Íconos -->
    <div class="flex gap-4 mt-2 md:mt-0 md:ml-4 text-gray-600">

        <button wire:click="edit({{ $lesson->id }})">
            <i class="fas fa-edit hover:text-indigo-600"></i>
        </button>

        <button x-on:click="destroyLesson({{ $lesson->id }})">
            <i class="fas fa-trash-alt hover:text-red-600"></i>
        </button>

        <button>
            <i class="fas fa-chevron-down hover:text-blue-600"></i>
        </button>

    </div>

</div>
                    @endif


                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <div x-data="{
        open: @entangle('lessonCreate.open'),
        platform: @entangle('lessonCreate.platform'),
    }">

        <!-- Botón para abrir el formulario -->
        <div
            x-on:click="open = !open"
            class="h-8 w-8 flex items-center justify-center bg-indigo-100 cursor-pointer"
            style="clip-path: polygon(70% 0, 100% 50%, 70% 100%, 0 100%, 0 0)">
            <i class="fa-solid fa-plus text-indigo-600"></i>
        </div>

        <!-- FORMULARIO -->
        <div x-show="open" x-transition class="mt-4 p-4 border rounded-lg bg-white space-y-4">

            <!-- Nombre de la lección -->
            <div>
                <x-label value="Nombre de la lección" />
                <x-input class="w-full" wire:model="lessonCreate.name" />
                <x-input-error for="lessonCreate.name" />
            </div>

            <!-- Slug -->
            {{-- <div>
                <x-label value="Slug" />
                <x-input class="w-full" wire:model="lessonCreate.slug" />
                <x-input-error for="lessonCreate.slug" />
            </div> --}}

            <!-- Selector de plataforma -->
            <div class="flex gap-6">

                <!-- Botón plataforma VIDEO -->
                <button
                    type="button"
                    x-on:click="platform = 1"
                    class="inline-flex flex-col justify-center items-center w-20 h-24 border rounded"
                    :class="platform == 1 ? 'border-indigo-500 text-indigo-500' : 'border-gray-300'">

                    <i class="fa-solid fa-video text-2xl mb-1"></i>
                    <span class="text-xs">Video</span>
                </button>

                <!-- Botón plataforma YouTube -->
                <button
                    type="button"
                    x-on:click="platform = 2"
                    class="inline-flex flex-col justify-center items-center w-20 h-24 border rounded"
                    :class="platform == 2 ? 'border-indigo-500 text-indigo-500' : 'border-gray-300'">

                    <i class="fa-brands fa-youtube text-2xl mb-1"></i>
                    <span class="text-xs">YouTube</span>
                </button>

            </div>

            <!-- INPUT para VIDEO (Archivo) -->
            <div x-show="platform == 1" x-transition>
                <x-label value="Subir video" />
                <x-input-error for="video" />

                <x-progress-indicators wire:model="video" />

            </div>

            <!-- INPUT para YOUTUBE (URL) -->
            <div x-show="platform == 2" x-transition>
                <x-label value="URL de YouTube" />
                <x-input class="w-full" wire:model="url" placeholder="Ej: https://www.youtube.com/watch?v=..." />
                <x-input-error for="url" />
            </div>

            <!-- Botón guardar -->
            <div class="flex justify-end">
                <x-button wire:click="store">

                    Guardar lección
                </x-button>
            </div>

        </div>

    </div>

</div>
