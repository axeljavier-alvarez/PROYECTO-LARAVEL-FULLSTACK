<div>

    <h1 class="text-xl font-semibold mb-2">
        Carrito de compras
    </h1>

    <div class="grid lg:grid-cols-5 gap-12">
        <div class="lg:col-span-3">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <ul class="space-y-4">

                    @forelse (Cart::instance('shopping')->content() as $item)
                        <li class="flex">
                            <figure class="w-40 shrink-0">
                                <img src="{{ $item->options->image }}"
                                    class="w-full aspect-video object-cover rounded-lg">
                            </figure>

                            <div class="flex-1 ml-4 overflow-hidden">
                                <h2 class="font-semibold truncate">
                                    <a href="">
                                        {{ $item->name }}
                                    </a>
                                </h2>

                                <p class="text-gray-500">
                                   {{ $item->options->teacher }} 
                                </p>

                                <p class="font-semibold">
                                    {{ number_format($item->price, 2) }} USD
                                </p>
                            </div>

                            <div class="ml-6">
                                <button
                                    wire:click="remove('{{ $item->rowId }}')"
                                    class="text-sm text-red-600 font-bold">
                                    Eliminar
                                </button>
                            </div>
                        </li>

                    @empty
                        <li class="text-gray-500 text-center py-4">
                            No hay productos en el carrito.
                        </li>
                    @endforelse

                </ul>
            </div>
        </div>

        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-semibold mb-2">
                    Resumen
                </h2>

                <div class="flex justify-between items-center">
                    <p class="text-2xl">
                        Total:
                    </p>
                    <p class="text-lg">
                        {{ number_format(Cart::instance('shopping')->total(), 2) }} USD
                    </p>
                </div>

                <div class="mt-4">

                    @if (Cart::instance('shopping')->count())
                    <a href="{{ route('checkout.index') }}" class="btn btn-red block w-full text-center">
                        Proceder con el pago
                    </a>

                    </button>

                    @else
                        
                    @endif
                    
                </div>

            </div>
        </div>
    </div>
</div>
