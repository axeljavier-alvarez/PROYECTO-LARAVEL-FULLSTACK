<div class="md:flex md:items-center">
                    <h1 class="md:flex-1 truncate">
                        Sección <?php echo e($loop->iteration); ?>:<br class="md:hidden">
                        <span class="font-semibold">
                            <?php echo e($section->name); ?>

                        </span>
                    </h1>

                    <div class="space-x-3 md:shrink-0 md:ml-4">
                        <button wire:click="edit(<?php echo e($section->id); ?>)">
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
                                    window.Livewire.find('<?php echo e($_instance->getId()); ?>').call('destroy', <?php echo e($section->id); ?>)
                                }
                            });
                        ">
                            <i class="far fa-trash-alt hover:text-red-600"></i>
                        </button>

                    </div>
                </div><?php /**PATH C:\laragon\www\codersfree\resources\views/instructor/sections/show.blade.php ENDPATH**/ ?>