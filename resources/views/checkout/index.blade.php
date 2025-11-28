<x-app-layout>

    <x-container class="mt-8">

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 lg:gap-12">

        <div class="order-2 lg:order-1 col-span-1 lg:col-span-3">
            <div class="bg-white rounded-lg shadow-lg p-6 mb-2">
                <ul class="space-y-4">

                    @forelse (Cart::instance('shopping')->content() as $item)
                        <li class="lg:flex">
                            <figure class="w-full lg:w-40 lg:shrink-0">
                                <img src="{{ $item->options->image }}"
                                    class="w-full aspect-video object-cover rounded-lg">
                            </figure>

                            <div class="lg:flex-1 lg:ml-4 overflow-hidden">
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

                            
                        </li>

                    @empty
                        <li class="text-gray-500 text-center py-4">
                            No hay productos en el carrito.
                        </li>
                    @endforelse

                </ul>
            </div>

           
        </div>


         <div class="order-1 lg:order-2 col-span-1 lg:col-span-2">
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
                    <button
                         class="btn btn-red block w-full text-center disabled:opacity-50">
                         Procesar pago
                     </button>                    

                </div>

            </div>
        </div>

        </div>


    </x-container>

        
</x-app-layout>