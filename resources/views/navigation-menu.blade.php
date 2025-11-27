@php
    $links = [
        [
            'name' => 'Cursos',
            'route' => route('courses.index'),
            'active' => request()->routeIs('courses.*')
        ]
    ];
@endphp

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/">
                        <img src="{{ asset('storage/courses/image/municipalidad.png') }}" class="h-16 w-auto" alt="Logo">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @foreach ($links as $item)
                        <x-nav-link href="{{ $item['route'] }}" :active="$item['active']">
                            {{ $item['name'] }}
                        </x-nav-link>
                    @endforeach
                </div>
            </div>

            <!-- Right Section: Carrito + Usuario -->
            <div class="hidden sm:flex sm:items-center sm:space-x-4">
                <!-- Carrito -->
                <div class="relative"
                x-data="{
                count: {{ Cart::instance('shopping')->count() }}
                }"
                x-on:cart-updated.window="
                {{-- console.log('prueba') --}}
                {{-- console.log($event.detail[0]) --}}
                count =$event.detail[0]
                "
                >
                    <a href="{{ route('cart.index') }}" class="text-gray-600 text-xl relative">
                        <i class="fa-solid fa-cart-shopping text-xl"></i>
                        <span
                            x-text="count"
                            class="absolute -top-1 -right-1 transform translate-x-1/2 -translate-y-1/2 inline-flex items-center justify-center h-5 w-5 text-xs font-bold text-white bg-blue-500 rounded-full">
                        </span>
                    </a>
                </div>


                <!-- Usuario / Dropdown -->
                <div class="ms-4 relative">
                    @auth
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50">
                                            {{ Auth::user()->name }}
                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link href="{{ route('profile.show') }}">Profile</x-dropdown-link>
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">Log Out</x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    @else
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="text-gray-600">
                                    <i class="fa-regular fa-circle-user text-xl"></i>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link href="{{ route('login') }}">Iniciar Sesión</x-dropdown-link>
                                <x-dropdown-link href="{{ route('register') }}">Registrarse</x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    @endauth
                </div>
            </div>

            <!-- Hamburger para móvil -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @foreach ($links as $item)
                <x-responsive-nav-link href="{{ $item['route'] }}" :active="$item['active']">
                    {{ $item['name'] }}
                </x-responsive-nav-link>
            @endforeach
            <x-responsive-nav-link href="{{ route('login')}}">
                Iniciar sesión
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('register')}}">
                Registrarse
            </x-responsive-nav-link>
        </div>

        <!-- Responsive User Options -->
        @auth
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="shrink-0 mr-3">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif
                    <div>
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</nav>
