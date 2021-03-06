<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/" class="logo font-sans text-2xl font-bold">
                        WE FASHION
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('sale.product')" :active="request()->routeIs('sale.product')">
                        {{ __('SOLDES') }}
                    </x-nav-link>
                    <x-nav-link :href="route('man.product')" :active="request()->routeIs('man.product')">
                        {{ __('HOMME') }}
                    </x-nav-link>
                    <x-nav-link :href="route('woman.product')" :active="request()->routeIs('woman.product')">
                        {{ __('FEMME') }}
                    </x-nav-link>
                </div>
                <div>
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <x-nav-link href="{{ url('/admin') }}">
                                    {{ __('Dashboard') }}
                                </x-nav-link>
                                <!--<a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>-->
                            @else
                                <!--<a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>-->
                                <x-nav-link href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </x-nav-link>
                                @if (Route::has('register'))
                                    <x-nav-link href="{{ route('register') }}">
                                        {{ __('Register') }}
                                    </x-nav-link>
                                    <!--<a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>-->
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
            <!-- Hamburger -->
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
            <x-responsive-nav-link :href="route('sale.product')" :active="request()->routeIs('sale.product')">
                {{ __('SOLDES') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('man.product')" :active="request()->routeIs('man.product')">
                {{ __('HOMME') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('woman.product')" :active="request()->routeIs('woman.product')">
                {{ __('FEMME') }}
            </x-responsive-nav-link>
        </div>
    </div>
</nav>
