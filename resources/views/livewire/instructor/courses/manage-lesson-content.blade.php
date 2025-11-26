<div class="space-y-3">

    <div>
        @if($editVideo)
            <div x-data="{ platform: @entangle('platform') }">

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

                <div>

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

                <div class="flex justify-end space-x-2">
                    <x-danger-button wire:click="$set('editVideo', false)">
                        Cancelar
                    </x-danger-button>

                    <x-button wire:click="saveVideo">
                        Actualizar
                    </x-button>
                </div>

            </div>

        @else
            <div>
                <h2 class="font-semibold text-lg mb-1">Video del curso</h2>

                @if($lesson->is_processed)
                    <div>
                        <div class="md:flex md:items-center mb-2">
                            <img
                                src="{{ $lesson->image }}"
                                class="w-full md:w-20 aspect-video object-cover object-center"
                                alt="{{ $lesson->name }}">
                            <p class="text-sm truncate md:flex-1 md:ml-4">
                                {{ $lesson->video_original_name }}
                            </p>
                        </div>
                    </div>
                @else
                    <div>
                        <table class="table-auto w-full">
                            <thead class="border-b border-gray-200">
                                <tr class="font-bold">
                                    <td class="px-4 py-2">Nombre del archivo</td>
                                    <td class="px-4 py-2">Tipo</td>
                                    <td class="px-4 py-2">Estado</td>
                                    <td class="px-4 py-2">Fecha</td>
                                </tr>
                            </thead>

                            <tbody class="border-b border-gray-200">
                                <tr>
                                    <td class="px-4 py-2">{{ $lesson->video_original_name }}</td>
                                    <td class="px-4 py-2">Video</td>
                                    <td class="px-4 py-2">Procesando</td>
                                    <td class="px-4 py-2">{{ $lesson->created_at->format('d/m/Y') }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <p class="mt-2">El video se está procesando</p>
                    </div>
                @endif

                <x-button wire:click="$set('editVideo', true)">
                    Video
                </x-button>

            </div>
        @endif
    </div>

    <hr>

    <div>
        <h2 class="font-semibold text-lg mb-1">Descripción de la lección</h2>

        @if($editDescription)
            <form wire:submit="saveDescription">

                <x-ckeditor wire:model="description" />
<x-input-error for="description"
                    class="mt-2"/>
                <div class="flex justify-end mt-4">
                    <x-button>
                        Actualizar
                        </x-button>
                </div>


            </form>
        @else
            <div class="text-gray-600 ckeditor mb-2">
                {!! $lesson->description ?? 'Aún no se ha escrito ninguna descripción' !!}
            </div>

            <x-button wire:click="$set('editDescription', true)">
                Descripción
            </x-button>
        @endif
    </div>

    <hr>

    <div class="md:space-y-2">
       <x-toggle label="Publicado"
       wire:model="is_published" />
       <x-toggle label="Vista Previa"
       wire:model="is_preview" />
    </div>

</div>
