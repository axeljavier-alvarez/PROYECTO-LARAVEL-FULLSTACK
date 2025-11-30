<div>
<div class="grid grid-cols-3 gap-8">
    <div class="col-span-2">

        <iframe class="w-full aspect-video" src="https://www.youtube.com/embed/<?php echo e($current->video_path); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

        <h1 class="text-3xl font-semibold mt-4">
           <?php echo e($lessons->pluck('id')->search($current->id) + 1); ?>. <?php echo e($current->name); ?>

        </h1>

        <!--[if BLOCK]><![endif]--><?php if($current->description): ?>
            <p class="text-gray-600 mt-2">
                <?php echo e($current->description); ?>

            </p>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <div class="flex items-center space-x-2">
            <?php if (isset($component)) { $__componentOriginal592735d30e1926fbb04ff9e089d1fccf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal592735d30e1926fbb04ff9e089d1fccf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.toggle','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('toggle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal592735d30e1926fbb04ff9e089d1fccf)): ?>
<?php $attributes = $__attributesOriginal592735d30e1926fbb04ff9e089d1fccf; ?>
<?php unset($__attributesOriginal592735d30e1926fbb04ff9e089d1fccf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal592735d30e1926fbb04ff9e089d1fccf)): ?>
<?php $component = $__componentOriginal592735d30e1926fbb04ff9e089d1fccf; ?>
<?php unset($__componentOriginal592735d30e1926fbb04ff9e089d1fccf); ?>
<?php endif; ?>
            Marcar esta unidad como completada
        </div>

        <div class="bg-white shadow-xl rounded-lg px-6 py-4 mt-2">
            <div class="flex justify-between">
                <button  wire:click="previousLesson()" class="font-bold">
                    Tema anterior
                </button>
                <button wire:click="nextLesson()" href="" class="font-bold">
                    Siguiente tema
                </button>
            </div>
        </div>

    </div>
    <aside class="col-span-1">
        <div class="card">
            <h1 class="text-2xl leading-8 text-center mb-4">
                <a class="hover:text-blue-600" href="<?php echo e(route('courses.show', $course)); ?>">
                    <?php echo e($course->title); ?>

                </a>
            </h1>

            
            <div class="flex items-center">
                <figure class="mr-4 shrink-0">
                    <img class="w-12 h-12 object-cover rounded-full" src="<?php echo e($course->teacher->profile_photo_url); ?>" alt="">
                </figure>

                <div class="flex-1">
                    <p>
                        <?php echo e($course->teacher->name); ?>

                    </p>
                </div>


            </div>

            
            <div class="mt-2">
                    <p class="text-gray-600 text-sm">
                        10% completado
                    </p>

                    <div class="relative pt-1">
                        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                            <div
                                style="width:10%"
                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500">
                            </div>
                        </div>
                    </div>
            </div>

            
            <ul class="space-y-4 text-gray-600">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <button class="text-left flex justify-between">
                        <span>
                            <?php echo e($section['name']); ?>

                        </span>

                        <i class="mt-1 fas fa-angle-down">

                        </i>

                    </button>

                    <ul class="space-y-1 mt-2">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $section['lessons']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e(route('courses.status', [$course, $lesson['slug']])); ?>" class="w-full flex">
                                <i class="fa-solid fa-circle mt-1 mr-2"></i>
                                <span>
                                    <?php echo e($lessons->pluck('id')->search($lesson['id'] ) +1); ?> .
                                    <?php echo e($lesson['name']); ?>

                                </span>
                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </ul>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </ul>
        </div>
    </aside>
</div>
</div>
<?php /**PATH C:\laragon\www\codersfree\resources\views/livewire/course-status.blade.php ENDPATH**/ ?>