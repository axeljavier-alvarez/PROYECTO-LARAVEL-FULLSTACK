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

    
    <figure class="mb-20">
        <img class="w-full aspect-[1/1] md:aspect-[3/1] object-cover object-center" src="<?php echo e(asset('img/welcome/programacion.jpg')); ?>" alt="">
    </figure>

    
    <section class="mb-24">
        <?php if (isset($component)) { $__componentOriginala766c2d312d6f7864fe218e2500d2bba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala766c2d312d6f7864fe218e2500d2bba = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <h1 class="text-2xl fon-semibold text-center mb-8">
            CONTENIDO
            </h1>

            <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <li>
                    <a href="">
                        <img class="aspect-video object-cover object-center rounded-lg" src="http://codersfree.test/img/servicios/cursoxd.webp" alt="">
                    </a>
                    <h1 class="text-xl text-center font-semibold mt-4 mb-2">
                        <a href="">
                            Cursos online
                        </a>
                    </h1>

                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos fugiat vitae, blanditiis tempora aliquam optio deserunt nulla porro repellendus </p>

                </li>

                <li>
                    <a href="">
                        <img class="aspect-video object-cover object-center rounded-lg" src="http://codersfree.test/img/servicios/desarrollo.jpg" alt="">
                    </a>
                    <h1 class="text-xl text-center font-semibold mt-4 mb-2">
                        <a href="">
                            Diseño web
                        </a>
                    </h1>

                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos fugiat vitae, blanditiis tempora aliquam optio deserunt nulla porro repellendus </p>

                </li>

                <li>
                    <a href="">
                        <img class="aspect-video object-cover object-center rounded-lg" src="http://codersfree.test/img/servicios/cursos.jpg" alt="">
                    </a>
                    <h1 class="text-xl text-center font-semibold mt-4 mb-2">
                        <a href="">
                            Asesorias
                        </a>
                    </h1>

                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos fugiat vitae, blanditiis tempora aliquam optio deserunt nulla porro repellendus </p>

                </li>

                <li>
                    <a href="">
                        <img class="aspect-video object-cover object-center rounded-lg" src="http://codersfree.test/img/servicios/blog.webp" alt="">
                    </a>
                    <h1 class="text-xl text-center font-semibold mt-4 mb-2">
                        <a href="">
                            Blog
                        </a>
                    </h1>

                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos fugiat vitae, blanditiis tempora aliquam optio deserunt nulla porro repellendus </p>

                </li>
            </ul>
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

    </section>

    
    <section>

        <?php if (isset($component)) { $__componentOriginala766c2d312d6f7864fe218e2500d2bba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala766c2d312d6f7864fe218e2500d2bba = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <h1 class="text-2xl font-semibold text-center mb-8">
                ULTIMOS CURSOS
            </h1>
        <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <div class="bg-white rounded-lg overflow-hidden">
                    <figure>
                        <img class="w-full aspect-video object-cover object-center" src="<?php echo e($course-> image); ?>" alt="<?php echo e($course->title); ?>">
                    </figure>

                    <div class="px-6 pt-4 pb-5">
                        <h1 class="line-clamp-2 text-lg leading-5 min-h-[42px] mb-1">
                            <a href="<?php echo e(route('courses.show', $course)); ?>">
                                <?php echo e($course->title); ?>

                            </a>
                        </h1>

                        <p class="text-gray-500 text-sm mb-1">
                            Prof: <?php echo e($course->teacher->name); ?>

                            
                        </p>

                        <ul class="text-xs flex space-x-1 mb-1">
                            <li><i class="fas fa-star text-yellow-400"></i></li>
                            <li><i class="fas fa-star text-yellow-400"></i></li>
                            <li><i class="fas fa-star text-yellow-400"></i></li>
                            <li><i class="fas fa-star text-yellow-400"></i></li>
                            <li><i class="fas fa-star text-yellow-400"></i></li>
                        </ul>

                        <p class="font-semibold mb-2">
                        <?php if($course->price->value == 0): ?>
                        <span class="text-green-500">
                            Gratis
                        </span>
                        <?php else: ?>
                        <span class="text-gray-700">

                            <?php echo e(number_format($course->price->value, 2)); ?> USD
                            
                        </span>

                        <?php endif; ?>
                        </p>

                        <a href="<?php echo e(route('courses.show', $course)); ?>" class="btn btn-blue block w-full text-center">
                            Más información
                        </a>



                    </div>
                </div>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
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

    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\codersfree\resources\views/welcome.blade.php ENDPATH**/ ?>