<div>

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
