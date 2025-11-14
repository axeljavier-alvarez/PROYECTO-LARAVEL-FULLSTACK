<div>

    <h1 class="text-2xl font-semibold">Video promocional</h1>

    <hr class="mt-2 mb-6">

<div class="grid grid-cols-2 gap-6">

        <div class="col-span-1">
            <!--[if BLOCK]><![endif]--><?php if($course->video_path): ?>

            <?php else: ?>
            <figure>
                <img class="w-full aspect-video object-cover" src="<?php echo e($course->image); ?>" alt="<?php echo e($course->title); ?>">
            </figure>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
        <div class="col-span-1">
            <p class="mb-4">
                Lorem ipsum dolor sit amet, consectetur
            </p>

            <?php if (isset($component)) { $__componentOriginal8a2d84abbcfd50c549f3c043d4c4f9c9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a2d84abbcfd50c549f3c043d4c4f9c9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.progress-indicators','data' => ['wire:model' => 'video']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('progress-indicators'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'video']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a2d84abbcfd50c549f3c043d4c4f9c9)): ?>
<?php $attributes = $__attributesOriginal8a2d84abbcfd50c549f3c043d4c4f9c9; ?>
<?php unset($__attributesOriginal8a2d84abbcfd50c549f3c043d4c4f9c9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a2d84abbcfd50c549f3c043d4c4f9c9)): ?>
<?php $component = $__componentOriginal8a2d84abbcfd50c549f3c043d4c4f9c9; ?>
<?php unset($__componentOriginal8a2d84abbcfd50c549f3c043d4c4f9c9); ?>
<?php endif; ?>

        </div>

    </div>
</div>
<?php /**PATH C:\laragon\www\codersfree\resources\views/livewire/instructor/courses/promotional-video.blade.php ENDPATH**/ ?>