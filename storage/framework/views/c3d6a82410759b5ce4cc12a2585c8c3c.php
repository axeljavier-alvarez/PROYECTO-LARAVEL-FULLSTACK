  <?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['rating' => 5, 'size' => 'xs']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['rating' => 5, 'size' => 'xs']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

  <?php
      
      $font_size = match($size){
        'xs' => 'text-xs',
        'sm' => 'text-sm',
        'md' => 'text-base',
        'lg' => 'text-lg',
        'xl' => 'text-xl',
        default => 'text-xs'
      };
  ?>
  

    <ul <?php echo e($attributes->merge(['class' => "flex space-x-1 $font_size"])); ?>>
    <li><i class="fas fa-star <?php echo e($rating >=0.5 ? 'text-yellow-400' : 'text-gray-600'); ?>"></i></li>
    <li><i class="fas fa-star <?php echo e($rating >=1.5 ? 'text-yellow-400' : 'text-gray-600'); ?>"></i></li>
    <li><i class="fas fa-star <?php echo e($rating >=2.5 ? 'text-yellow-400' : 'text-gray-600'); ?>"></i></li>
    <li><i class="fas fa-star <?php echo e($rating >=3.5 ? 'text-yellow-400' : 'text-gray-600'); ?>"></i></li>
    <li><i class="fas fa-star <?php echo e($rating >=4.5 ? 'text-yellow-400' : 'text-gray-600'); ?>"></i></li>
    </ul><?php /**PATH C:\laragon\www\codersfree\resources\views/components/stars.blade.php ENDPATH**/ ?>