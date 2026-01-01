<a href="<?php echo e($path); ?>" <?php echo count($attributes) ? $column->arrayToAttributes($attributes) : ''; ?>>
    <!--[if BLOCK]><![endif]--><?php if($column->isHtml()): ?>
        <?php echo $title; ?>

    <?php else: ?>
        <?php echo e($title); ?>

    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</a>
<?php /**PATH C:\laragon\www\codersfree\vendor\rappasoft\laravel-livewire-tables\src/../resources/views/includes/columns/link.blade.php ENDPATH**/ ?>