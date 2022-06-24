<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight leading-relaxed text-center">
            La partie dashboard réserver à la création, <br />
            modification et suppression d'un produit par l'administrateur
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-1">
                {{$products->links()}}
            </div>
            <div class="my-2 flex items-center justify-end">
                <x-link-button href="{{route('admin.products.create')}}">
                    Créer un Nouveau
                </x-link-button>
            </div>
            @if (session()->has('message'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-3">
                <table class="w-full border-b border-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="text-left px-2 py-2 text-lg text-gray-500">#</th>
                        <th class="text-left px-2 py-2 text-lg text-gray-500">Nom</th>
                        <th class="text-left px-2 py-2 text-lg text-gray-500">Prix</th>
                        <th class="text-left px-2 py-2 text-lg text-gray-500">Etat</th>
                        <th class="text-left px-2 py-2 text-lg text-gray-500" colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    @foreach ($products as $product)
                        <tr class="whitespace-nowrap">
                            <td class="px-2 py-2">{{ $product->id }}</td>
                            <td class="px-2 py-2 text-lg font-semibold text-gray-500">{{ $product->name }}</td>
                            <td class="px-2 py-2">{{ $product->price }} €</td>
                            <td class="px-2 py-2 text-bold {{ $product->visibility =='published' ? 'text-green-800' : 'text-red-800' }}" >{{ $product->visibility == 'published' ? 'Publier' : 'Dépublier' }}</td>
                            <td  class="px-2 py-2 text-sm text-gray-500">
                                <a href="{{ route('admin.products.edit', $product) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M7.243 18H3v-4.243L14.435 2.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 18zM3 20h18v2H3v-2z"/></svg>
                                </a>
                            </td>
                            <td class="px-2 py-2 text-sm text-gray-500">
                                <form id="destroy" action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Voulez-vous supprimer Ce Produit ?');">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-red-600 hover:text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-1">
                {{$products->links()}}
            </div>
        </div>
    </div>
</x-app-layout>
