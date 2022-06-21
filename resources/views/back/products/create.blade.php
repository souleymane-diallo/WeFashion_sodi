<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            @if (isset($product))
                {{ __('Modification d\'un produit') }}
            @else
                {{ __('Creation d\'un produit') }}
            @endif
        </h2>
    </x-slot>

    <x-form-card>
        <div class="my-2 flex items-center justify-end">
            <x-link-button href="/admin">
                <x-button class="ml-3">
                    {{  __('Retour') }}
                </x-button>
            </x-link-button>
        </div>
        <!-- Erreurs de validation -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>

        @endif
        @if(isset($product))
            <form action="{{ route('admin.products.update', $product) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
        @else

            <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
        @endif
                @csrf
            <div>
                <x-label for="name" :value="__('Titre')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', ($product->name)??'')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="description" :value="__('Description')" />
                <x-textarea class="block mt-1 w-full" id="description" name="description">{{old('description', ($product->description)??'') }}</x-textarea>
            </div>
            <div class="mt-4 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2">
                <div>
                    <x-label for="price" :value="__('Prix')" />
                    <x-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price', ($product->price)??'')" required />
                </div>
                <div>
                    <x-label for="reference" :value="__('Reférence')" />
                    <x-input id="reference" class="block mt-1 w-full" type="text" name="reference" :value="old('reference',($product->reference)??'' )" required />
                </div>
            </div>
            <div class="mt-4 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2">
                <div class="flex">
                    <label for="sale" class="inline-flex items-center pr-6">
                        <input id="sale" type="radio" @if(isset($product->state) == 'sale') checked @endif  name="state" value="sale" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <span class="ml-2 text-sm text-gray-600">{{ __('En Soldes') }}</span>
                    </label>
                    <label for="standard" class="inline-flex items-center">
                        <input id="standard" type="radio" @if(isset($product->state) == 'standard') checked @endif name="state" value="standard" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Standard') }}</span>
                    </label>
                </div>
                <div>
                    <p class="py-2">Choissisez une / des tailles</p>
                    <div class="flex">
                        @foreach($sizes as $id => $name)
                            <div class="flex items-start pr-4">
                                <div class="flex items-center h-5">
                                    <input id="size{{$id}}" value="{{ $id }}" {{ ( !empty(old('sizes')) and in_array($id, old('sizes')) ) ? 'checked' : '' }}
                                        name="sizes[]" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                                    >
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="author{{$id}}" class="font-medium text-gray-700">{{$name}}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="mt-4 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2">
                <div>
                    <label for="category" class="block font-medium text-gray-700">Categorie</label>
                    <select id="category" name="category_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Choissisez une categorie</option>
                        @foreach ($category as $id => $name)
                            <option {{ old('category_id') == $id ? 'selected' : '' }}
                                    {{ (isset($product->category->id) == $id)? 'selected' : '' }}
                                    value="{{$id}}"
                            >{{$name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex">
                    <label for="published" class="inline-flex items-center pr-6">
                        <input id="published" type="radio" @if(isset($product->visibility) == 'published') checked @endif value="published"  name="visibility" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Publier') }}</span>
                    </label>
                    <label for="unpublished" class="inline-flex items-center">
                        <input id="unpublished" type="radio" @if(isset($product->visibility) == 'unpublished') checked @endif value="unpublished"  name="visibility" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Dépublier') }}</span>
                    </label>
                </div>
            </div>
            <div class="mt-4 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2">
                <div>
                    <x-label for="title_image" :value="__('Titre de l\'image')" />
                    <x-input id="title_image" class="block mt-1 w-full" type="text" name="title_image" :value="old('title_image')" />
                </div>
                <div>
                    <x-label for="picture" :value="__('Ajouter l\'image')" />
                    <x-input id="piture" class="block mt-1 w-full" type="file" name="picture" />
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ !isset($product) ? __('Créér') : __('Modifier') }}
                </x-button>
            </div>
        </form>
    </x-form-card>
</x-app-layout>

