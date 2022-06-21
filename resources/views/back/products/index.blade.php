<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Admin Product')
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-1">
                {{$products->links()}}
            </div>
            <div class="my-2 flex items-center justify-end">
                <x-link-button href="{{route('admin.products.create')}}" class="p-2">
                    Nouveau
                </x-link-button>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-3">
                <table class="w-full">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="text-left px-2 py-2 text-xs text-gray-500">#</th>
                        <th class="text-left px-2 py-2 text-xs text-gray-500">Nom</th>
                        <th class="text-left px-2 py-2 text-xs text-gray-500">Prix</th>
                        <th class="text-left px-2 py-2 text-xs text-gray-500">Etat</th>
                        <th class="text-left px-2 py-2 text-xs text-gray-500 col-span-2"></th>
                        <th class="text-left px-2 py-2 text-xs text-gray-500 col-span-2"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    @foreach ($products as $product)
                        <tr class="whitespace-nowrap">
                            <td class="px-2 py-2">{{ $product->id }}</td>
                            <td class="px-2 py-2 text-sm text-gray-500">{{ $product->name }}</td>
                            <td class="px-2 py-2">{{ $product->price }}</td>
                            <td class="px-2 py-2">{{ $product->visibility }}</td>
                            <x-link-button href="{{ route('admin.products.edit', $product) }}">
                                @lang('edit')
                            </x-link-button>
                            <x-link-button onclick="event.preventDefault(); document.getElementById('destroy').submit();">
                                @lang('Delete')
                            </x-link-button>
                            <form id="destroy" action="" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
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
