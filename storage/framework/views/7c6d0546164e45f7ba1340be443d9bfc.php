<div>

    <!--[if BLOCK]><![endif]--><?php if(Cart::instance('shopping')->content()->where('id', $course->id)->first()): ?>


    <button
    wire:key="removeCart"
    wire:click="removeCart"
    class="btn btn-blue w-full uppercase mb-2">
    Eliminar del carrito
    </button>

    <?php else: ?>


    <button

    wire:key="addCart"
    wire:click="addCart"
    class="btn btn-blue w-full uppercase mb-2">
    Agregar al carrito
    </button>
    
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    

    <button class="btn btn-red w-full uppercase">
        Comprar ahora
    </button>
</div>
<?php /**PATH C:\laragon\www\codersfree\resources\views/livewire/course-enrolled.blade.php ENDPATH**/ ?>