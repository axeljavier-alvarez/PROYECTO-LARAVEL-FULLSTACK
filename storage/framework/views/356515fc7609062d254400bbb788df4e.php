<div>
    <div class="grid grid-cols-4 gap-6 mt-5">
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
            <ul>
                <!--[if BLOCK]><![endif]--><?php for($i = 5; $i >= 1; $i--): ?> 
                <li class="flex items-center">
                    <?php if (isset($component)) { $__componentOriginalc1838dab69175fa625a76ca35492c358 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc1838dab69175fa625a76ca35492c358 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.progress-bar','data' => ['width' => round($course->reviews->where('rating', $i)->count() * 100 / $course->reviews->count(), 2),'class' => 'flex-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('progress-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['width' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(round($course->reviews->where('rating', $i)->count() * 100 / $course->reviews->count(), 2)),'class' => 'flex-1']); ?>
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
                        <?php echo e(round($course->reviews->where('rating', $i)->count() * 100 / $course->reviews->count(), 2)); ?> %
                    </span>
                </li>
                <?php endfor; ?><!--[if ENDBLOCK]><![endif]-->
            </ul>
        </div>

    </div>
    
</div>
<?php /**PATH C:\laragon\www\codersfree\resources\views/livewire/manage-reviews.blade.php ENDPATH**/ ?>