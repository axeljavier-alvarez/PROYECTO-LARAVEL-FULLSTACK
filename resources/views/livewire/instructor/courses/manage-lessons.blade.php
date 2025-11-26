<div>

    <div
        x-data="{
        orderLessons: @entangle('orderLessons'),
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
        x-init="
            new Sortable($refs.lessons, {
                group: 'lessons',
                animation: 150,
                handle: '.handle-lesson',
                ghostClass: 'blue-background-class',
                store: {
                    set: (sortable) => {
                        Livewire.dispatch('sortLessons', {
                            sorts: sortable.toArray(),
                            sectionId: {{ $section->id }}
                        });
                    }
                }
            });
        "
        class="mb-6"
    >

        <ul class="space-y-4" x-ref="lessons">
            @foreach ($lessons as $lesson)
            <li wire:key="lesson-{{ $lesson->id }}" data-id="{{ $lesson->id }}">
                <div class="bg-white rounded-lg shadow-lg px-6 py-4">

                    @if ($lessonEdit['id'] == $lesson->id)
                        <form wire:submit="update">
                            <div class="flex items-center space-x-2">
                                <x-input wire:model="lessonEdit.name" class="flex-1"
                                         placeholder="Ingrese el nombre de la lección"/>
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

                    <div x-data="{ open:false }">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">

                            <!-- Nombre y número -->
                            <h1 class="flex items-center gap-2 truncate cursor-move handle-lesson text-gray-800">
                                <i class="fas fa-play-circle text-blue-600"></i>
                                Lección <span x-text="orderLessons.indexOf({{ $lesson->id }}) + 1"></span>: {{ $lesson->name }}
                            </h1>

                            <!-- Íconos -->
                            <div class="flex gap-4 mt-2 md:mt-0 md:ml-4 text-gray-600">

                                <!-- Editar -->
                                <button wire:click="edit({{ $lesson->id }})" type="button">
                                    <i class="fas fa-edit hover:text-indigo-600"></i>
                                </button>

                                <!-- Eliminar -->
                                <button type="button" x-on:click="destroyLesson({{ $lesson->id }})">
                                    <i class="fas fa-trash-alt hover:text-red-600"></i>
                                </button>

                                <!-- Mover / chevron (solo decorativo) -->
                                <button x-on:click="open = !open">
                                    <i class="fas"
                                    :class="{
                                        'fa-chevron-up hover:text-blue-600': open,
                                        'fa-chevron-down hover:text-blue-600': !open
                                    }"></i>
                                </button>

                            </div>
                        </div>

                        <div x-show="open" x-cloak class="mt-4">
                            @livewire('instructor.courses.manage-lesson-content', [
                                'lesson' => $lesson
                            ], key('section-'. $section->id. '-lesson-' . $lesson->id ))
                        </div>
                    </div>

                    @endif

                </div>
            </li>
            @endforeach
        </ul>
    </div>

    <!-- Formulario creación lección -->
    <div x-data="{
        open: @entangle('lessonCreate.open'),
        platform: @entangle('lessonCreate.platform')
    }">

        <!-- Botón para abrir formulario -->
        <div
            x-on:click="open = !open"
            class="h-8 w-8 flex items-center justify-center bg-indigo-100 cursor-pointer"
            style="clip-path: polygon(70% 0, 100% 50%, 70% 100%, 0 100%, 0 0)">
            <i class="fa-solid fa-plus text-indigo-600"></i>
        </div>

        <!-- FORMULARIO -->
        <div x-show="open" x-transition class="mt-4 p-4 border rounded-lg bg-white space-y-4">

            <!-- Nombre de lección -->
            <div>
                <x-input class="w-full" wire:model="lessonCreate.name"
                         placeholder="Ingrese el nombre de la lección"/>
                <x-input-error for="lessonCreate.name" />
            </div>

           <div>

            <x-label class="mb-1">
                Plataformas
            </x-label>
             <!-- Selector de plataforma + texto en misma fila -->
            <div class="flex flex-col md:flex-row md:items-center md:gap-6 gap-3">

                <!-- VIDEO -->
                <button
                    type="button"
                    x-on:click="platform = 1"
                    class="inline-flex flex-col justify-center items-center w-20 h-24 border rounded"
                    :class="platform == 1 ? 'border-indigo-500 text-indigo-500' : 'border-gray-300'">

                    <i class="fa-solid fa-video text-2xl mb-1"></i>
                    <span class="text-xs">Video</span>
                </button>

                <!-- YOUTUBE -->
                <button
                    type="button"
                    x-on:click="platform = 2"
                    class="inline-flex flex-col justify-center items-center w-20 h-24 border rounded"
                    :class="platform == 2 ? 'border-indigo-500 text-indigo-500' : 'border-gray-300'">

                    <i class="fa-brands fa-youtube text-2xl mb-1"></i>
                    <span class="text-xs">YouTube</span>
                </button>

                <!-- TEXTO RESPONSIVO -->
                <p class="text-gray-600 text-sm md:ml-4 md:mt-0 mt-2">
                    Primero debes elegir una plataforma para subir tu contenido
                </p>
            </div>

            <!-- INPUT para VIDEO -->
            <div x-show="platform == 1" x-transition>
                <x-label value="Subir video" />
                <x-input-error for="video" />
                <x-progress-indicators wire:model="video" />
            </div>

            <!-- INPUT para YOUTUBE -->
            <div x-show="platform == 2" x-transition>
                <x-label value="URL de YouTube" />
                <x-input class="w-full" wire:model="url" placeholder="Ej: https://www.youtube.com/watch?v=..." />
                <x-input-error for="url" />
            </div>
           </div>
            <!-- Botón guardar -->
            <div class="flex justify-end">
                <x-button wire:click="store">Guardar lección</x-button>
            </div>

        </div>
    </div>
</div>
