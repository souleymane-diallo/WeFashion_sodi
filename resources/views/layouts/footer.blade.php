<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
        <div class="flex justify-between flex-wrap">
            <div class="flex flex-col ">
                <!-- Logo -->
                <div class="shrink-0 ">
                    <h4 class="py-3">Informations</h4>
                </div>

                <!-- Navigation Links -->
                <div class="space-x-8 sm:-my-px sm:flex">
                    <x-nav-link >
                        {{ __('Mentions légales') }}
                    </x-nav-link>
                </div>
                <div class="space-x-8 sm:-my-px sm:flex">
                    <x-nav-link >
                        {{ __('Presse') }}
                    </x-nav-link>
                </div>
                <div class="space-x-8 sm:-my-px sm:flex">
                    <x-nav-link >
                        {{ __('Fabrication') }}
                    </x-nav-link>
                </div>
            </div>
            <div class="flex flex-col">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <h4 class="py-3">Services Client</h4>
                </div>

                <!-- Navigation Links -->
                <div class="space-x-8 sm:-my-px sm:flex">
                    <x-nav-link >
                        {{ __('Contactez-nous') }}
                    </x-nav-link>
                </div>
                <div class="space-x-8 sm:-my-px sm:flex">
                    <x-nav-link >
                        {{ __('Livraison & Retour') }}
                    </x-nav-link>
                </div>
                <div class="space-x-8 sm:-my-px sm:flex">
                    <x-nav-link >
                        {{ __('Conditions de vente') }}
                    </x-nav-link>
                </div>
            </div>
            <div class="flex flex-col">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <h4 class="py-3">Réseaux sociaux</h4>
                </div>

                <!-- Navigation Links -->
                <div class="space-x-8 sm:-my-px sm:flex">
                    <a href="#" class="pb-1">
                        <x-facebook-logo class="block h-15 w-auto fill-current text-gray-600" />
                    </a>

                </div>
                <div class="space-x-8 sm:-my-px sm:flex">
                    <a href="#" class="pb-1">
                        <x-instagram-logo class="block h-15 w-auto " />
                    </a>
                </div>
                <div class="space-x-8 sm:-my-px sm:flex">
                    <x-nav-link >
                        {{ __('inscrivez vous à la newsletter') }}
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>
</nav>
