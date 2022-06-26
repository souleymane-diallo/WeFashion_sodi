<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __("Description detaillée d'un produit") }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2">
                        <div class="group bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden">
                                <img height="" src="{{ asset('images/'. $product->picture->link?? '-') }}" alt="{{$product->picture->title}}" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                            </div>
                            <div class="p-3">
                                <h3 class="mt-4 text-xl text-gray-700 font-semibold">{{ $product->name?? '-' }}</h3>
                                <p class="mt-1 text-lg font-medium text-gray-900">{{$product->description?? 'aucun'}} </p>
                            </div>
                        </div>
                        <div>
                            <p class="mt-1 text-lg font-medium text-gray-900">Prix : {{ $product->price?? '-' }} €</p>
                            <p class="mt-1 text-lg font-medium text-gray-900">Reference : {{ $product->reference?? '-' }} </p>
                            <p class="mt-1 text-lg font-medium text-gray-900">Etat : {{ $product->state?? '-' }} </p>
                            <p class="mt-1 text-lg font-medium text-gray-900">Category : {{ $product->category->name?? 'aucun' }} </p>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="sizes" class="block text-lg font-medium text-gray-700">Taille</label>
                                <select id="sizes" name="sizes" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option>Choissisez votre taille</option>
                                    @foreach($product->sizes as $size)
                                        <option>{{ $size->name?? 'aucun' }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <x-button class="my-2">
                                {{ __('Acheter') }}
                            </x-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
