<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creation d\'un produit') }}
        </h2>
    </x-slot>
    <x-form-card>
        <!-- Erreurs de validation -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif
        <form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div>
                <x-label for="name" :value="__('Titre')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="description" :value="__('Description')" />
                <x-textarea class="block mt-1 w-full" id="description" name="description">{{ old('description') }}</x-textarea>
            </div>
            <div class="mt-4 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2">
                <div>
                    <x-label for="price" :value="__('Prix')" />
                    <x-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required autofocus />
                </div>
                <div>
                    <x-label for="reference" :value="__('Reférence')" />
                    <x-input id="reference" class="block mt-1 w-full" type="text" name="reference" :value="old('reference')" required autofocus />
                </div>
            </div>
            <div class="mt-4 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2">
                <div>
                    <label for="state" class="block font-medium text-gray-700">Etat du produit</label>
                    <select id="state" {{ old('state') }} name="state" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>Choissisez un état</option>
                        <option value="sale">Solde</option>
                        <option value="standard">Standart</option>
                    </select>
                </div>
                <div>
                    <p class="py-2">Choissisez une / des tailles</p>
                    <div class="flex">
                        @foreach($sizes as $id => $name)
                            <div class="flex items-start pr-4">
                                <div class="flex items-center h-5">
                                    <input id="size{{$id}}" value="{{ $id }}" {{ ( !empty(old('sizes')) and in_array($id, old('sizes')) ) ? 'checked' : '' }} name="sizes[]" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" >
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
                        @foreach ($category as $id => $name)
                            <option {{ old('category_id') == $id ? 'selected' : '' }} value="{{$id}}">{{$name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="status" class="block font-medium text-gray-700">Visiblité</label>
                    <select id="visibility" {{old('visibility')}} name="visibility" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>Choissisez un état</option>
                        <option value="0">non publier</option>
                        <option value="1">publier</option>
                    </select>
                </div>
            </div>
            <div class="mt-4 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2">
                <div>
                    <x-label for="description" :value="__('Titre de l\'image')" />
                    <x-input id="title_image" class="block mt-1 w-full" type="text" name="title_image" :value="old('title_image')" />
                </div>
                <div>
                    <x-input id="title" class="block mt-1 w-full" type="file" name="picture" />
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Créér') }}
                </x-button>
            </div>
        </form>
    </x-form-card>
</x-app-layout>

