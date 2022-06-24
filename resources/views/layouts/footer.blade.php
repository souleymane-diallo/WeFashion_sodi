<footer class="sticky top-[100vh]">
    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <div class="flex justify-between flex-wrap">
                <div class="flex flex-col ">
                    <!-- Logo -->
                    <div class="shrink-0 ">
                        <h3 class="py-3 font-semibold text-lg uppercase">Informations</h3>
                    </div>

                    <!-- Navigation Links -->
                    <ul>
                        <li class="space-x-8 sm:-my-px sm:flex">
                            <x-nav-link >
                                {{ __('Mentions Légales') }}
                            </x-nav-link></li>
                        <li class="space-x-8 sm:-my-px sm:flex">
                            <x-nav-link >
                                {{ __('Presse') }}
                            </x-nav-link>
                        </li>
                        <li class="space-x-8 sm:-my-px sm:flex">
                            <x-nav-link >
                                {{ __('Fabrication') }}
                            </x-nav-link>
                        </li>
                    </ul>
                </div>
                <div class="flex flex-col">
                    <div class="shrink-0 flex items-center">
                        <h3 class="py-3 font-semibold text-lg uppercase">Services Client</h3>
                    </div>
                    <ul>
                        <li class="space-x-8 sm:-my-px sm:flex">
                            <x-nav-link >
                                {{ __('Contactez-nous') }}
                            </x-nav-link>
                        </li>
                        <li class="space-x-8 sm:-my-px sm:flex">
                            <x-nav-link >
                                {{ __('Livraison & Retour') }}
                            </x-nav-link>
                        </li>
                        <li class="space-x-8 sm:-my-px sm:flex">
                            <x-nav-link >
                                {{ __('Conditions de Vente') }}
                            </x-nav-link>
                        </li>
                    </ul>
                </div>
                <div class="flex flex-col">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <h3 class="py-3 font-semibold text-lg uppercase">Réseaux sociaux</h3>
                    </div>

                    <!-- Navigation Links -->
                    <ul>
                        <li class="space-x-8 sm:-my-px sm:flex">
                            <a href="https://fr-fr.facebook.com/" class="pb-1" name="facebook">
                                <x-facebook-logo class="block h-15 w-auto fill-current text-gray-600" />
                            </a>
                        </li>
                        <li class="space-x-8 sm:-my-px sm:flex">
                            <a href="https://www.instagram.com/" class="pb-1" name="instagram">
                                <x-instagram-logo class="block h-15 w-auto " />
                            </a>
                        </li>
                        <li class="space-x-8 sm:-my-px sm:flex">
                            <x-nav-link>
                                {{ __('Inscrivez vous à la Newsletter') }}
                            </x-nav-link>
                        </li>
                    </ul>
                </div>
            </div>

            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="#" class="hover:underline">Souleymane DIALLO "SoJo" ™</a>. All Rights Reserved.
        </span>
        </div>

    </nav>
</footer>
