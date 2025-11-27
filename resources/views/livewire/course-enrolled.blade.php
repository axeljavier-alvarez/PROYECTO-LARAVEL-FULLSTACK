<div>

    @if ($course->price->course ==0)
    <button
        wire:click="enrolled"
        class="btn btn-red w-full uppercase">
            Inscribite ahora
    </button>
    @else



    @if(Cart::instance('shopping')->content()->where('id', $course->id)->first())


    <button
    wire:key="removeCart"
    wire:click="removeCart"
    class="btn btn-blue w-full uppercase mb-2">
    Eliminar del carrito
    </button>

    @else


    <button

    wire:key="addCart"
    wire:click="addCart"
    class="btn btn-blue w-full uppercase mb-2">
    Agregar al carrito
    </button>

    @endif


    <button
    wire:click="buyNow"
    class="btn btn-red w-full uppercase">
        Comprar ahora
    </button>

    @endif
</div>
