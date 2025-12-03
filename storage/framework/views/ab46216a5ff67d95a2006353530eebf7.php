<div>

    <?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.8.3/plyr.css" />
    <?php $__env->stopPush(); ?>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="col-span-1 lg:col-span-2">

        <!--[if BLOCK]><![endif]--><?php if(Gate::allows('enrolled', $course) || $current->is_preview || $course->price->value==0): ?>

        

        <div wire:ignore>


        <!--[if BLOCK]><![endif]--><?php if($current->platform == 1): ?>

        <video id="player" playsinline controls data-poster="<?php echo e($current->image); ?>">
            <source src="<?php echo e(Storage::url($current->video_path)); ?>" type="video/mp4">
        </video>

        <?php else: ?>
        


        <div class="plyr__video-embed" id="player">
            <iframe
                src="https://www.youtube.com/embed/<?php echo e($current->video_path); ?>"
                allowfullscreen
                allowtransparency
                allow="autoplay"
            ></iframe>
        </div>

        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <h1 class="text-3xl font-semibold mt-4">
           <?php echo e($lessons->pluck('id')->search($current->id) + 1); ?>. <?php echo e($current->name); ?>

        </h1>

        <!--[if BLOCK]><![endif]--><?php if($current->description): ?>
            <p class="text-gray-600 mt-2">
                <?php echo e($current->description); ?>

            </p>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <?php else: ?>

        <div class="relative">
            <figure>
                <img class="w-full aspect-video object-cover object-center" src="<?php echo e($current->image); ?>" alt="">
            </figure>

            <div class="absolute inset-0 bg-black bg-opacity-40 flex flex-col justify-center items-center">
                <p class="text-white uppercase text-3xl font-mono font-bold">
                    Adquiere el curso
                </p>

                <i class="fas fa-unlock text-5xl text-white">
                
                </i>

                <a href="<?php echo e(route('courses.show', $course)); ?>" class="btn btn-red mt-4">
                    Comprar curso
                </a>

            </div>
            

            
        </div>
            
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        

        <!--[if BLOCK]><![endif]--><?php if(auth()->guard()->check()): ?>
        <div class="flex items-center space-x-2">
            <?php if (isset($component)) { $__componentOriginal592735d30e1926fbb04ff9e089d1fccf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal592735d30e1926fbb04ff9e089d1fccf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.toggle','data' => ['wire:model' => 'completed','label' => 'Marcar esta unidad como completada']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('toggle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'completed','label' => 'Marcar esta unidad como completada']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal592735d30e1926fbb04ff9e089d1fccf)): ?>
<?php $attributes = $__attributesOriginal592735d30e1926fbb04ff9e089d1fccf; ?>
<?php unset($__attributesOriginal592735d30e1926fbb04ff9e089d1fccf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal592735d30e1926fbb04ff9e089d1fccf)): ?>
<?php $component = $__componentOriginal592735d30e1926fbb04ff9e089d1fccf; ?>
<?php unset($__componentOriginal592735d30e1926fbb04ff9e089d1fccf); ?>
<?php endif; ?>
        </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


        <div class="bg-white shadow-xl rounded-lg px-6 py-4 mt-2">
            <div class="flex justify-between">
                <button  wire:click="previousLesson()" class="font-bold">
                    Tema anterior
                </button>
                <button wire:click="nextLesson()" href="" class="font-bold">
                    Siguiente tema
                </button>
            </div>
        </div>

    </div>
    <div class="col-span-1">
        <aside class="card mb-4">
            <h1 class="text-2xl leading-8 text-center mb-4">
                <a class="hover:text-blue-600" href="<?php echo e(route('courses.show', $course)); ?>">
                    <?php echo e($course->title); ?>

                </a>
            </h1>

            
            <div class="flex items-center">
                <figure class="mr-4 shrink-0">
                    <img class="w-12 h-12 object-cover rounded-full" src="<?php echo e($course->teacher->profile_photo_url); ?>" alt="">
                </figure>

                <div class="flex-1">
                    <p>
                        <?php echo e($course->teacher->name); ?>

                    </p>
                </div>


            </div>

            
            <div class="mt-2">
                    <p class="text-gray-600 text-sm">
                        <?php echo e($advance); ?>% completado
                    </p>

                    <div class="relative pt-1">
                        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                            <div
                                style="width:<?php echo e($advance); ?>"
                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500">
                            </div>
                        </div>
                    </div>
            </div>

            
            <ul class="space-y-4 text-gray-600">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li x-data="{open: '<?php echo e($section['id'] == $current->section_id); ?>'}">
                    <button x-on:click="open =!open" class="text-left flex justify-between">
                        <span>
                            <?php echo e($section['name']); ?>

                        </span>

                        <i class="mt-1 fas fa-angle-down" x-bind:class="open ? 'fa-angle-up' : 'fa-angle-down'">

                        </i>

                    </button>

                    <ul class="space-y-1 mt-2" x-show="open" x-cloak>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $section['lessons']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e(route('courses.status', [$course, $lesson['slug']])); ?>" class="w-full flex">
                                <i class="fa-solid <?php echo e($lesson['id'] == $current->id ? 'fa-circle-dot' : 'fa-circle'); ?> mt-1 mr-2
                                    <?php echo e(DB::table('course_lesson_user')
                                        ->where('lesson_id', $lesson['id'])
                                        ->where('user_id', auth()->id())
                                        ->where('completed', 1)
                                        ->count() ? 'text-yellow-500' : ''); ?>">
                                </i>
                                <span>
                                    <?php echo e($lessons->pluck('id')->search($lesson['id'] ) +1); ?> .
                                    <?php echo e($lesson['name']); ?>

                                </span>
                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </ul>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </ul>
        </aside>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('review_enabled', $course)): ?>

        

        <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['wire:click' => '$set(\'review.open\', true)','class' => 'w-full flex justify-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => '$set(\'review.open\', true)','class' => 'w-full flex justify-center']); ?>
            Calificar este curso
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
        <?php endif; ?>
    </div>
</div>




<?php if (isset($component)) { $__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dialog-modal','data' => ['wire:model' => 'review.open']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dialog-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'review.open']); ?>
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
        rating: <?php if ((object) ('review.rating') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('review.rating'->value()); ?>')<?php echo e('review.rating'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('review.rating'); ?>')<?php endif; ?>
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

        <textarea wire:model="review.comment" class="w-full mt-4" placeholder="Mensaje ...">

        </textarea>
     <?php $__env->endSlot(); ?>

     <?php $__env->slot('footer', null, []); ?> 

        <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['wire:click' => 'storeReview']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'storeReview']); ?>
            Dejar reseña
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
<?php $__env->startPush('js'); ?>
<script src="https://cdn.plyr.io/3.8.3/plyr.js"></script>
<script>
      const player = new Plyr('#player');

    //   player.on('ready', event=>{
    //     player.play();
    //   });

      player.on('ended', event=>{

        window.Livewire.find('<?php echo e($_instance->getId()); ?>').call('completedLesson')
        // player.play();
      })


</script>
    
<?php $__env->stopPush(); ?>
</div>
<?php /**PATH C:\laragon\www\codersfree\resources\views/livewire/course-status.blade.php ENDPATH**/ ?>