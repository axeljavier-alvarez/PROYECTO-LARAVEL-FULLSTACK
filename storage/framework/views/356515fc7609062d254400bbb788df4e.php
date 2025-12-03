<div>
    <div class="grid grid-cols-4 gap-6 mb-8 mt-8">

        <div class="col-span-1">
            <p class="text-6xl font-bold text-center">
                <?php echo e($course->rating); ?>

            </p>

            <?php if (isset($component)) { $__componentOriginale32d02d1a95a04916bc939ee53f28428 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale32d02d1a95a04916bc939ee53f28428 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.stars','data' => ['class' => 'justify-center','rating' => ''.e($course->rating).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('stars'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'justify-center','rating' => ''.e($course->rating).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale32d02d1a95a04916bc939ee53f28428)): ?>
<?php $attributes = $__attributesOriginale32d02d1a95a04916bc939ee53f28428; ?>
<?php unset($__attributesOriginale32d02d1a95a04916bc939ee53f28428); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale32d02d1a95a04916bc939ee53f28428)): ?>
<?php $component = $__componentOriginale32d02d1a95a04916bc939ee53f28428; ?>
<?php unset($__componentOriginale32d02d1a95a04916bc939ee53f28428); ?>
<?php endif; ?>

            <p class="text-lg text-center">
                Valoraciones
            </p>
        </div>

        <div class="col-span-3">
            <?php
                $totalReviews = $course->reviews->count();
            ?>

            <ul>
                <!--[if BLOCK]><![endif]--><?php for($i = 5; $i >= 1; $i--): ?>
                    <?php
                        $count = $course->reviews->where('rating', $i)->count();
                        $percent = $totalReviews > 0 ? round($count * 100 / $totalReviews, 2) : 0;
                    ?>

                    <li class="flex items-center">
                        <?php if (isset($component)) { $__componentOriginalc1838dab69175fa625a76ca35492c358 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc1838dab69175fa625a76ca35492c358 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.progress-bar','data' => ['width' => $percent,'class' => 'flex-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('progress-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['width' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($percent),'class' => 'flex-1']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc1838dab69175fa625a76ca35492c358)): ?>
<?php $attributes = $__attributesOriginalc1838dab69175fa625a76ca35492c358; ?>
<?php unset($__attributesOriginalc1838dab69175fa625a76ca35492c358); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc1838dab69175fa625a76ca35492c358)): ?>
<?php $component = $__componentOriginalc1838dab69175fa625a76ca35492c358; ?>
<?php unset($__componentOriginalc1838dab69175fa625a76ca35492c358); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginale32d02d1a95a04916bc939ee53f28428 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale32d02d1a95a04916bc939ee53f28428 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.stars','data' => ['rating' => ''.e($i).'','class' => 'ml-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('stars'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['rating' => ''.e($i).'','class' => 'ml-4 mr-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale32d02d1a95a04916bc939ee53f28428)): ?>
<?php $attributes = $__attributesOriginale32d02d1a95a04916bc939ee53f28428; ?>
<?php unset($__attributesOriginale32d02d1a95a04916bc939ee53f28428); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale32d02d1a95a04916bc939ee53f28428)): ?>
<?php $component = $__componentOriginale32d02d1a95a04916bc939ee53f28428; ?>
<?php unset($__componentOriginale32d02d1a95a04916bc939ee53f28428); ?>
<?php endif; ?>

                        <span class="w-16">
                            <?php echo e($percent); ?> %
                        </span>
                    </li>
                <?php endfor; ?><!--[if ENDBLOCK]><![endif]-->
            </ul>
        </div>

    </div>

    <ul class="space-y-6">
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="flex space-x-8">
            <figure class="shrink-0">
                <img
                    class="w-12 h-12 object-cover object-center rounded-full" 
                    src="<?php echo e($review->user->profile_photo_url); ?>" 
                    alt="">
            </figure>

            <div class="flex-1">
                <p class="font-semibold">
                    <?php echo e($review->user->name); ?>

                </p>

                <div class="flex space-x-2 items-center">
                    <?php if (isset($component)) { $__componentOriginale32d02d1a95a04916bc939ee53f28428 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale32d02d1a95a04916bc939ee53f28428 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.stars','data' => ['rating' => ''.e($review->rating).'','class' => 'inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('stars'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['rating' => ''.e($review->rating).'','class' => 'inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale32d02d1a95a04916bc939ee53f28428)): ?>
<?php $attributes = $__attributesOriginale32d02d1a95a04916bc939ee53f28428; ?>
<?php unset($__attributesOriginale32d02d1a95a04916bc939ee53f28428); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale32d02d1a95a04916bc939ee53f28428)): ?>
<?php $component = $__componentOriginale32d02d1a95a04916bc939ee53f28428; ?>
<?php unset($__componentOriginale32d02d1a95a04916bc939ee53f28428); ?>
<?php endif; ?>
                    <p class="text-sm">
                        <?php echo e($review->created_at->diffForHumans()); ?>

                    </p>
                </div>

                <div>
                    <?php echo e($review->comment); ?>

                </div>
            </div>

            <div class="shrink-0">
                <?php if (isset($component)) { $__componentOriginaldf8083d4a852c446488d8d384bbc7cbe = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                     <?php $__env->slot('trigger', null, []); ?> 
                        <button>
                            <i class="fas fa-ellipsis-v">

                            </i>
                        </button>
                     <?php $__env->endSlot(); ?>

                     <?php $__env->slot('content', null, []); ?> 
                        <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            Editar
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>  

                        <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            Eliminar
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>  

                     <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe)): ?>
<?php $attributes = $__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe; ?>
<?php unset($__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf8083d4a852c446488d8d384bbc7cbe)): ?>
<?php $component = $__componentOriginaldf8083d4a852c446488d8d384bbc7cbe; ?>
<?php unset($__componentOriginaldf8083d4a852c446488d8d384bbc7cbe); ?>
<?php endif; ?>
            </div>

        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
    </ul>
</div>
<?php /**PATH C:\laragon\www\codersfree\resources\views/livewire/manage-reviews.blade.php ENDPATH**/ ?>