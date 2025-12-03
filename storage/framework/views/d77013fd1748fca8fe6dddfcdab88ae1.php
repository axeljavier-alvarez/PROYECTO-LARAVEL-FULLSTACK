<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['width' => 100]));

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

foreach (array_filter((['width' => 100]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>


    <div <?php echo e($attributes->merge(['class' => '' ])); ?>>
       <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-300">

       <div style="width:<?php echo e($width); ?>%"
       class="shadow-none flex flex-col text-center
       whitespace-nowrap text-white justify-center bg-gray-500">

       </div>

    </div>

</div><?php /**PATH C:\laragon\www\codersfree\resources\views/components/progress-bar.blade.php ENDPATH**/ ?>