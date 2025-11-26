<div class="space-y-6">

    @if ($sections->count())

    <!-- AGREGO ID PARA SORTABLE -->
    <ul class="mb-6 space-y-6" id="sections-list">

        @foreach ($sections as $section)

        <!-- CADA ITEM DEBE TENER data-id -->
        <li wire:key="section-{{ $section->id }}" data-id="{{ $section->id }}" class="bg-white">

            <!-- BOTÓN + Y FORMULARIO DE CREACIÓN ENTRE SECCIONES -->
           <div x-data="{ open: false }"
     x-on:close-form-{{ $section->id }}.window="open = false">


                <!-- Botón + -->
                <div
                    x-on:click="open = !open"
                    class="h-8 w-8 flex items-center justify-center bg-indigo-100 cursor-pointer"
                    style="clip-path: polygon(70% 0%, 100% 50%, 70% 100%, 0% 100%, 0% 0%);"
                >
                    <i class="fas fa-plus text-indigo-700 transition-transform duration-300"
                        :class="{ 'rotate-45': open, 'rotate-0': !open }">
                    </i>
                </div>

                <!-- Formulario insertar sección debajo -->
                <div x-show="open" x-cloak class="ml-4 flex-1">
                    <form wire:submit="storePosition({{ $section->id }})">
                        <div class="bg-gray-100 rounded-lg shadow-lg p-6">

                            <x-label>Nueva sección</x-label>

                            <x-input
                                wire:model="sectionPositionCreate.{{ $section->id }}.name"
                                class="w-full"
                                placeholder="Ingrese el nombre de la sección"
                            />

                            <x-input-error for="sectionPositionCreate.{{ $section->id }}.name" />

                            <div class="flex justify-end mt-4 space-x-2">
                                <x-danger-button @click="open = false">Cancelar</x-danger-button>
                                <x-button>Agregar sección</x-button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
            <!-- FIN BOTÓN + -->

            <!-- SECCIÓN MOSTRADA / EDITABLE -->
            <div class="bg-gray-100 rounded-lg shadow-lg px-6 py-4 flex justify-between items-center">

                <div class="flex-1">
                    @if ($sectionEdit['id'] == $section->id)
                        @include('instructor.sections.edit')
                    @else
                        @include('instructor.sections.show')
                    @endif

                    <div class="mt-8">

                        {{-- {{ $orderLessons->join('-') }} --}}
                        @livewire('instructor.courses.manage-lessons', [
                            'section' => $section,
                            'lessons' => $section->lessons,
                            'orderLessons'=>$orderLessons

                        ], key('section-' . $section->id . '-position-' . $loop->iteration . '-' . $orderLessons->join('-')))


                    </div>
                </div>

                <!-- ICONO PARA ARRASTRAR -->
                {{-- <div class="cursor-move px-3 text-gray-400 hover:text-gray-600">
                    <i class="fas fa-bars"></i>
                </div> --}}

            </div>

        </li>

        @endforeach

    </ul>
    @endif

    <hr class="border-gray-300">

    @include('instructor.sections.create')

    @push('js')

        <script>
            Livewire.on('clear-input-section', () => {
                const input = document.querySelector('input[wire\\:model="name"]');
                if (input) input.value = "";
            });
        </script>

        <!-- SortableJS -->
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.6/Sortable.min.js"></script>

        <script>
            const list = document.getElementById('sections-list');

            new Sortable(list, {
                animation: 150,
                handle: '.cursor-move',
                ghostClass: 'bg-blue-200',

                store: {
                    set: (sortable) => {
                        @this.call('sortSections', sortable.toArray());
                    }
                }
            });
        </script>

    @endpush

</div>
