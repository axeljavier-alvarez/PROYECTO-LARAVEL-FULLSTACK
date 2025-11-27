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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container','data' => ['class' => 'mt-12']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-12']); ?>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <div class="col-span-1 lg:col-span-2 order-2 lg:order-1">
                

                <div class="mb-8">
<h1 class="text-3xl font-semibold mb-1">
                    <?php echo e($course->title); ?>

                </h1>

                <p class="mb-2">
                <?php echo e($course->summary); ?>


                </p>

                <figure>
                    <img class="w-full aspect-video object-cover objec-center"  src="<?php echo e($course->image); ?>" alt="">
                </figure>
                </div>
                

                <div class="mb-8">
                    <h2 class="text-2xl font-semibold mb-4">
                        Objetivos del curso
                    </h2>

                    <div class="bg-whit rounded-lg shadow p-6">
                        <ul class="grid grid-cols-1 lg:grid-cols-2 gap-4 text-gray-800">
                            <?php $__currentLoopData = $course->goals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $goal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="flex space-x-4">
                                <i class="fa-regular fa-circle-check text-lg">

                                </i>

                                <p>
                                    <?php echo e($goal->name); ?>

                                </p>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>

               
                <div class="mb-8">
                    <h2 class="text-2xl font-semibold mb-4">
                        Temario del curso
                    </h2>

                    <ul class="space-y-4">
                        <?php $__currentLoopData = $course->sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li x-data="{
                            open: false
                        }">
                            <div class="bg-white rounded-lg">

                                <button x-on:click="open = !open" class="flex w-full p-4 bg-gray-50 text-left border-b">
                                    <span class="text-xl font-semibold">
                                    <?php echo e($section->name); ?>

                                    </span>
                                    <span class="ml-auto">
                                        <?php echo e($section->lessons->count()); ?> clases
                                    </span>
                                </button>
                                <div class="p-4" x-show="open" x-cloak>
                                    <ul>
                                        <?php $__currentLoopData = $section->lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a href="" class="flex">
                                                <i class="far fa-play-circle text-blue-500 mt-0.5"></i>
                                                <span class="font-semibold text-gray-600 hover:text-blue-800 text-sm">
                                                    <?php echo e($lesson->name); ?>

                                                </span>
                                            </a>
                                        </li>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
               

                <div class="mb-8">
                    <h2 class="text-2xl font-semibold mb-4">
                        Requisitos del curso
                    </h2>

                    <ul class="list-disc list-inside">
                        <?php $__currentLoopData = $course->requirements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $requirement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <?php echo e($requirement->name); ?>

                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                
                <div>
                    <h2 class="text-2xl font-semibold mb-4">
                        Descripción
                    </h2>

                    <div>
                        <?php echo e($course->description); ?>

                    </div>

                </div>

            </div>

            <div class="col-span-1 order-1 lg:order-2">

                <div class="bg-white rounded-lg shadow p-6">


                    <div class="mb-4">

                     <p class="font-semibold text-2xl text-center mb-2">
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

                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('enrolled', $course)): ?>


                      <p class="flex items-center mb-1">
                        <span class="text-blue-600">
                            <svg class="fill-current h-5 w-5" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm-.75-4.25a1 1 0 112 0 1 1 0 01-2 0zM9.25 5a1 1 0 012 0v5a1 1 0 01-2 0V5z"/>
                            </svg>
                        </span>

                        <span class="font-semibold">
                            Adquirido el <?php echo e($course->dateOfAcquisition->format('d/m/Y')); ?>

                        </span>
                      </p>
                        <a href="<?php echo e(route('courses.status', $course)); ?>" class="btn btn-red text-center uppercase block w-full">
                            Continuar con el curso
                        </a>
                      <?php else: ?>
                       
                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('course-enrolled', ['course'=> $course]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1288738547-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                      <?php endif; ?>


                

                </div>

                <div>
                    <p class="font-semibold text-lg mb-1">
                        Detalle del curso:
                    </p>

                    <ul class="space-y-1">
                        <li>
                            <i class="far fa-calendar-alt inline-block w-6">

                            </i>

                            Ultima actualización <?php echo e($course->updated_at->format('d/m/Y')); ?>

                        </li>

                        <li>
                            <i class="far fa-clock inline-block w-6">

                            </i>

                            Duración: 10 horas

                        </li>

                        <li>
                            <i class="fas fa-chart-line inline-block w-6">

                            </i>
                            Nivel <?php echo e($course->level->name); ?>

                        </li>

                        <li>
                            <i class="fas fa-star inline-block w-6">

                            </i>
                            Calificación: 5
                        </li>
                        <li>
                            <i class="fas fa-infinity inline-block w-6">

                            </i>
                            Acceso de por vida
                        </li>

                    </ul>
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
<?php endif; ?>
<?php /**PATH C:\laragon\www\codersfree\resources\views/courses/show.blade.php ENDPATH**/ ?>