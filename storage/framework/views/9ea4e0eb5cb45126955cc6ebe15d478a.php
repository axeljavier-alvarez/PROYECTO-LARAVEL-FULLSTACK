<?php if (isset($component)) { $__componentOriginal0e13963cd964ea594eb49209b1b87de0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0e13963cd964ea594eb49209b1b87de0 = $attributes; } ?>
<?php $component = App\View\Components\InstructorLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('instructor-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\InstructorLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
d


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0e13963cd964ea594eb49209b1b87de0)): ?>
<?php $attributes = $__attributesOriginal0e13963cd964ea594eb49209b1b87de0; ?>
<?php unset($__attributesOriginal0e13963cd964ea594eb49209b1b87de0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0e13963cd964ea594eb49209b1b87de0)): ?>
<?php $component = $__componentOriginal0e13963cd964ea594eb49209b1b87de0; ?>
<?php unset($__componentOriginal0e13963cd964ea594eb49209b1b87de0); ?>
<?php endif; ?>
<?php if(): ?>

<?php endif; ?>
<?php /**PATH C:\laragon\www\codersfree\resources\views\instructor\courses\show.blade.php ENDPATH**/ ?>