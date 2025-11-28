<div>

    {{-- SI EL CURSO ES GRATIS --}}
    @if ($course->price->value == 0)

        @if ($course->students->contains(auth()->id()))
            <button class="btn btn-green w-full uppercase" disabled>
                Ya inscrito
            </button>
        @else
            <button
                wire:click="enrolled"
                class="btn btn-red w-full uppercase">
                Inscribite ahora
            </button>
        @endif

    {{-- SI EL CURSO ES DE PAGO --}}
    @else

        {{-- ¿Está en el carrito? --}}
        @if (Cart::instance('shopping')->content()->where('id', $course->id)->first())

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

        {{-- Comprar ahora --}}
        <button
            wire:click="buyNow"
            class="btn btn-red w-full uppercase">
            Comprar ahora
        </button>

    @endif
</div>
