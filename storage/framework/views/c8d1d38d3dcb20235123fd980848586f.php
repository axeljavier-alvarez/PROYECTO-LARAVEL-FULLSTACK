<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    <?php if (isset($component)) { $__componentOriginala766c2d312d6f7864fe218e2500d2bba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala766c2d312d6f7864fe218e2500d2bba = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container','data' => ['class' => 'mt-8']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-8']); ?>

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 lg:gap-12">

        <div class="order-2 lg:order-1 col-span-1 lg:col-span-3">
            <div class="bg-white rounded-lg shadow-lg p-6 mb-2">
                <ul class="space-y-4">

                    <?php $__empty_1 = true; $__currentLoopData = Cart::instance('shopping')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <li class="lg:flex">
                            <figure class="w-full lg:w-40 lg:shrink-0">
                                <img src="<?php echo e($item->options->image); ?>"
                                    class="w-full aspect-video object-cover rounded-lg">
                            </figure>

                            <div class="lg:flex-1 lg:ml-4 overflow-hidden">
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

                            
                        </li>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <li class="text-gray-500 text-center py-4">
                            No hay productos en el carrito.
                        </li>
                    <?php endif; ?>

                </ul>
            </div>

           
        </div>


         <div class="order-1 lg:order-2 col-span-1 lg:col-span-2">
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
                    <button
                         class="btn btn-red block w-full text-center disabled:opacity-50">
                         Procesar pago
                     </button>                    

                </div>

            </div>
        </div>

        </div>


     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala766c2d312d6f7864fe218e2500d2bba)): ?>
<?php $attributes = $__attributesOriginala766c2d312d6f7864fe218e2500d2bba; ?>
<?php unset($__attributesOriginala766c2d312d6f7864fe218e2500d2bba); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala766c2d312d6f7864fe218e2500d2bba)): ?>
<?php $component = $__componentOriginala766c2d312d6f7864fe218e2500d2bba; ?>
<?php unset($__componentOriginala766c2d312d6f7864fe218e2500d2bba); ?>
<?php endif; ?>

        
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\codersfree\resources\views/checkout/index.blade.php ENDPATH**/ ?>