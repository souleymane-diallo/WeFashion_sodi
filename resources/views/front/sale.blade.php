<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Les Produit en Solde') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-1">
                {{$products->links()}}
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-3">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-3">
                        @foreach ($products as $product )
                            <a href="{{url('product', $product->id) }}" class="group bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                                    <img height="" src="{{ asset('images/'. $product->picture->link) }}" alt="{{$product->picture->title}}" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                                </div>
                                <div class="p-3">
                                    <h3 class="mt-4 text-lg text-gray-700">{{ $product->name }}</h3>
                                    <p class="mt-1 text-lg font-medium text-gray-900">{{ $product->price }} €</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-1">
                {{$products->links()}}
            </div>
        </div>
    </div>
</x-app-layout>
