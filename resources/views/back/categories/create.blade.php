<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            @if (isset($category))
                {{ __('Modification d\'une Catégorie') }}
            @else
                {{ __('Creation d\'une Categorie') }}
            @endif
        </h2>
    </x-slot>

    <x-form-card>
        <div class="my-2 flex items-center justify-end">
            <x-link-button href="/admin">
                {{  __('Retour') }}
            </x-link-button>
        </div>
        <!-- Erreurs de validation -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                {{ session('message') }}
            </div>
        @endif

        @if(isset($category))
            <form action="{{ route('admin.categories.update', $category) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
        @else

            <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
        @endif
            @csrf
            <div>
                <x-label for="name" :value="__('Nom de la categorie')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', ($category->name)??'')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ !isset($category) ? __('Enregistrer') : __('Modifier') }}
                </x-button>
            </div>
        </form>
    </x-form-card>
</x-app-layout>

