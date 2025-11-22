<div class="md:flex md:items-center">

    <h1 class="md:flex-1 truncate">

        <!-- Vista ESCRITORIO (lado a lado) -->
        <div class="hidden md:flex items-center space-x-2">
            <span>Sección {{ $loop->iteration }}:</span>

            <span class="cursor-move font-semibold text-gray-800">
                {{ $section->name }}
            </span>
        </div>

        <!-- Vista MÓVIL (uno arriba del otro) -->
        <div class="md:hidden">
            <span>Sección {{ $loop->iteration }}:</span><br>
            <span class="cursor-move font-semibold text-gray-800">
                {{ $section->name }}
            </span>
        </div>

    </h1>

    <div class="space-x-3 md:shrink-0 md:ml-4">
        <button wire:click="edit({{ $section->id }})">
            <i class="fas fa-edit hover:text-indigo-600"></i>
        </button>

        <button x-on:click="
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¡No podrás revertir esto!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, bórralo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('destroy', {{ $section->id }})
                }
            });
        ">
            <i class="far fa-trash-alt hover:text-red-600"></i>
        </button>
    </div>

</div>
