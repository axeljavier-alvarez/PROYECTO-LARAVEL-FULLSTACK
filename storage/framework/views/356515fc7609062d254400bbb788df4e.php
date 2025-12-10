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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['wire:click' => 'edit('.e($review).')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'edit('.e($review).')']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['wire:click' => 'delete('.e($review).')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'delete('.e($review).')']); ?>
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

    <!-- nuevo xd -->
    <?php if (isset($component)) { $__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dialog-modal','data' => ['wire:model' => 'reviewEdit.open']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dialog-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'reviewEdit.open']); ?>
     <?php $__env->slot('title', null, []); ?> 
        <p class="text-3xl font-semibold text-center mt-4">
            !Tu opinion importa!
        </p>
     <?php $__env->endSlot(); ?>

     <?php $__env->slot('content', null, []); ?> 
        <p class="text-center mb-4">
            ¿Como fue tu experiencia?
        </p>

        <ul
        x-data="{
        rating: <?php if ((object) ('reviewEdit.rating') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('reviewEdit.rating'->value()); ?>')<?php echo e('reviewEdit.rating'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('reviewEdit.rating'); ?>')<?php endif; ?>
        }"
        class="flex justify-center space-x-3 text-gray-600">

            <li>
                <button x-on:click="rating = 1">
                <i class="fas fa-star text-2xl" x-bind:class="rating >= 1 ? 'text-yellow-500' : ''">

                </i>
                </button>
            </li>


            <li>
                <button x-on:click="rating = 2">
                <i class="fas fa-star text-2xl" x-bind:class="rating >= 2 ? 'text-yellow-500' : ''">

                </i>
                </button>
            </li>


            <li>
                <button x-on:click="rating = 3">
                <i class="fas fa-star text-2xl" x-bind:class="rating >= 3 ? 'text-yellow-500' : ''">

                </i>
                </button>
            </li>


            <li>
                <button x-on:click="rating = 4">
                <i class="fas fa-star text-2xl" x-bind:class="rating >= 4 ? 'text-yellow-500' : ''">

                </i>
                </button>
            </li>
            <li>
                <button x-on:click="rating = 5">
                <i class="fas fa-star text-2xl" x-bind:class="rating >= 5 ? 'text-yellow-500' : ''">

                </i>
                </button>
            </li>

        </ul>

        <textarea wire:model="reviewEdit.comment" class="w-full mt-4" placeholder="Mensaje ...">

        </textarea>
     <?php $__env->endSlot(); ?>

     <?php $__env->slot('footer', null, []); ?> 

        <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['wire:click' => 'update']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'update']); ?>
            Actualizar reseña
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $attributes = $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $component = $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f)): ?>
<?php $attributes = $__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f; ?>
<?php unset($__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f)): ?>
<?php $component = $__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f; ?>
<?php unset($__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f); ?>
<?php endif; ?>


</div>
<?php /**PATH C:\laragon\www\codersfree\resources\views/livewire/manage-reviews.blade.php ENDPATH**/ ?>