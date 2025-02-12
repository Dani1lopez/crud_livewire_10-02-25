<x-self.base>
    <div class="container mx-auto px-4 py-8">
        <!-- Barra de Búsqueda -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <div class="w-full md:w-auto mb-4 md:mb-0">
                <x-input placeholder="Buscar..."
                    class="w-full md:w-64 bg-gray-50 dark:bg-white border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-sm"
                    wire:model.live="buscar">
                    <i class="mr-2 fas fa-search text-gray-500 dark:text-gray-400"></i>
                </x-input>
            </div>
            <div>
                @livewire('crear-article')
            </div>
        </div>

        <!-- Tabla de Artículos -->
        @if ($articles->count())
            <div class="overflow-x-auto shadow-lg rounded-xl bg-white dark:bg-gray-800">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead @class([
                        'text-xs text-white uppercase',
                        'bg-blue-100 dark:bg-blue-900' => !Auth::user()->is_admin,
                        'bg-indigo-100 dark:bg-indigo-900' => Auth::user()->is_admin,
                    ])>
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-900 transition-colors duration-200"
                                wire:click="ordenar('title')">
                                Título <i class="ml-1 fas fa-sort text-gray-500 dark:text-gray-400"></i>
                            </th>
                            <th scope="col"
                                class="px-6 py-3 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-900 transition-colors duration-200"
                                wire:click="ordenar('content')">
                                Contenido <i class="ml-1 fas fa-sort text-gray-500 dark:text-gray-400"></i>
                            </th>
                            <th scope="col"
                                class="px-6 py-3 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-900 transition-colors duration-200"
                                wire:click="ordenar('name')">
                                Tag <i class="ml-1 fas fa-sort text-gray-500 dark:text-gray-400"></i>
                            </th>
                            <th scope="col" class="px-6 py-3">Acción</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($articles as $item)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-900 transition-colors duration-200">
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    {{ $item->title }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-500 dark:text-gray-400">
                                    {{ Str::limit($item->content, 50) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                        {{ $item->name }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                                    <button
                                        class="text-blue-500 hover:text-blue-700 dark:hover:text-blue-400 focus:outline-none">
                                        <i class="fas fa-edit text-lg"></i>
                                    </button>
                                    <button
                                        class="text-red-500 hover:text-red-700 dark:hover:text-red-400 focus:outline-none">
                                        <i class="fas fa-trash text-lg"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $articles->links() }}
            </div>
        @else
            <div @class([
                'rounded-lg p-6 text-center text-gray-500 dark:text-gray-400',
                'bg-blue-100 dark:bg-blue-900' => !Auth::user()->is_admin,
                'bg-indigo-100 dark:bg-indigo-900' => Auth::user()->is_admin,
            ])>
                <i class="fas fa-exclamation-circle text-4xl mb-4 block text-gray-700 dark:text-gray-300"></i>
                <p>No se ha encontrado ningún elemento.</p>
            </div>
        @endif

    </div>
</x-self.base>
