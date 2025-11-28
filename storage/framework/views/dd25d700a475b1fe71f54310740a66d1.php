<div>

    <h1 class="text-xl font-semibold mb-2">
        Carrito de compras
    </h1>

    <div class="grid lg:grid-cols-5 gap-12">
        <div class="lg:col-span-3">
            <div class="bg-white rounded-lg shadow-lg p-6 mb-2">
                <ul class="space-y-4">

                    <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = Cart::instance('shopping')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <li class="flex">
                            <figure class="w-40 shrink-0">
                                <img src="<?php echo e($item->options->image); ?>"
                                    class="w-full aspect-video object-cover rounded-lg">
                            </figure>

                            <div class="flex-1 ml-4 overflow-hidden">
                                <h2 class="font-semibold truncate">
                                    <a href="">
                                        <?php echo e($item->name); ?>

                                    </a>
                                </h2>

                                <p class="text-gray-500">
                                   <?php echo e($item->options->teacher); ?>

                                </p>

                                <p class="font-semibold">
                                    <?php echo e(number_format($item->price, 2)); ?> USD
                                </p>
                            </div>

                            <div class="ml-6">
                                <button
                                    wire:click="remove('<?php echo e($item->rowId); ?>')"
                                    class="text-sm text-red-600 font-bold">
                                    Eliminar
                                </button>
                            </div>
                        </li>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <li class="text-gray-500 text-center py-4">
                            No hay productos en el carrito.

                            <a href="<?php echo e(route('courses.index')); ?>"
                            class="text-blue-500 hover:text-blue-400">Ver todos los cursos</a>
                        </li>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                </ul>
            </div>

            <!--[if BLOCK]><![endif]--><?php if(Cart::instance('shopping')->count()): ?>


            <button
            wire:click="destroy"
            class="font-semibold text-red-500 text-sm">
                <i class="fas fa-trash-alt mr-2"></i>
                Vaciar el carrito de compras
            </button>

            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-semibold mb-2">
                    Resumen
                </h2>

                <div class="flex justify-between items-center">
                    <p class="text-2xl">
                        Total:
                    </p>
                    <p class="text-lg">
                        <?php echo e(number_format(Cart::instance('shopping')->total(), 2)); ?> USD
                    </p>
                </div>

                <div class="mt-4">

                    <!--[if BLOCK]><![endif]--><?php if(Cart::instance('shopping')->count()): ?>
                    <a href="<?php echo e(route('checkout.index')); ?>" class="btn btn-red block w-full text-center">
                        Proceder con el pago
                    </a>

                    <?php else: ?>
                    <button
                        disabled class="btn btn-red block w-full text-center disabled:opacity-50">
                         Proceder con el pago
                     </button>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                </div>

            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\codersfree\resources\views/livewire/manage-shopping-cart.blade.php ENDPATH**/ ?>