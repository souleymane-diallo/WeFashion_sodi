<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Dashboard pour les Categories')
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-2 flex items-center justify-end">
                <x-link-button href="{{route('admin.categories.create')}}" class="p-2">
                    Nouveau
                </x-link-button>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-3">
                <table class="w-full">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="text-left px-2 py-2 text-xs text-gray-500">#</th>
                        <th class="text-left px-2 py-2 text-xs text-gray-500">Nom Catégorie</th>
                        <th class="text-left px-2 py-2 text-xs text-gray-500 col-span-2"></th>
                        <th class="text-left px-2 py-2 text-xs text-gray-500 col-span-2"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    @foreach ($categories as $category)
                        <tr class="whitespace-nowrap">
                            <td class="px-2 py-2">{{ $category->id }}</td>
                            <td class="px-2 py-2 text-sm text-gray-500">{{ $category->name }}</td>
                            <x-link-button href="{{ route('admin.categories.edit', $category) }}">
                                @lang('edit')
                            </x-link-button>
                            <x-link-button onclick="event.preventDefault(); document.getElementById('destroy{{ $category->id }}').submit();">
                                @lang('Delete')
                            </x-link-button>
                            <form id="destroy" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
