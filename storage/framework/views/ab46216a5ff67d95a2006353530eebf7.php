<div>
<div class="grid grid-cols-3 gap-8">
    <div class="col-span-2">

        <iframe class="w-full aspect-video" src="https://www.youtube.com/embed/<?php echo e($current->video_path); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

        <h1 class="text-3xl font-semibold mt-4">
           <?php echo e($lessons->search($current->id) + 1); ?>. <?php echo e($current->name); ?>

        </h1>

        <!--[if BLOCK]><![endif]--><?php if($current->description): ?>
            <p class="text-gray-600 mt-2">
                <?php echo e($current->description); ?>

            </p>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    </div>
    <div class="col-span-1">

    </div>
</div>
</div>
<?php /**PATH C:\laragon\www\codersfree\resources\views/livewire/course-status.blade.php ENDPATH**/ ?>