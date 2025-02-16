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
                            <!-- Mejoras visuales en la columna Info -->
                            <th scope="col"
                                class="px-6 py-3 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-900 transition-colors duration-200 flex items-center justify-center">
                                <span class="relative group">
                                    Info
                                    <i
                                        class="ml-1 fas fa-info-circle text-gray-500 dark:text-gray-400 
                                    group-hover:text-gray-700 dark:group-hover:text-gray-300 transition-colors duration-200"></i>
                                    <div
                                        class="absolute bottom-full left-1/2 transform -translate-x-1/2 
                                    bg-gray-700 text-white text-xs rounded-md px-2 py-1 
                                    invisible group-hover:visible opacity-0 group-hover:opacity-100 
                                    transition-all duration-300 z-10">
                                        Ver detalles
                                        <svg class="absolute top-full left-1/2 transform -translate-x-1/2 
                                        text-gray-700 h-2 w-2 fill-current"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M10 12l-6-6h12z" />
                                        </svg>
                                    </div>
                                </span>
                            </th>
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
                                <!-- Mejoras visuales en el botón de info -->
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white flex justify-center">
                                    <button wire:click="detalle({{$item->id}})"
                                        class="relative inline-flex items-center justify-center w-8 h-8 rounded-full 
                                    bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 
                                    text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white 
                                    transition-all duration-200 focus:outline-none">
                                        <i class="fas fa-info text-base"></i>
                                        <div
                                            class="absolute -top-8 left-1/2 transform -translate-x-1/2 
                                        bg-gray-700 text-white text-xs rounded-md px-2 py-1 
                                        invisible group-hover:visible opacity-0 group-hover:opacity-100 
                                        transition-all duration-300 z-10">
                                            Detalles
                                            <svg class="absolute bottom-0 left-1/2 transform -translate-x-1/2 
                                            text-gray-700 h-2 w-2 fill-current rotate-180"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M10 8l6 6H4z" />
                                            </svg>
                                        </div>
                                    </button>
                                </td>
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
                                    <button wire:click="edit({{ $item->id }})"
                                        class="text-blue-500 hover:text-blue-700 dark:hover:text-blue-400 focus:outline-none">
                                        <i class="fas fa-edit text-lg"></i>
                                    </button>
                                    <button wire:click="confirmarDelete({{ $item->id }})"
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
        <!------------------------Modal para editar articulo-------------------------->
        @isset($uform->article)
            <x-dialog-modal wire:model="openUpdate">
                <x-slot name="title">

                </x-slot>
                <x-slot name="content">
                    <div class="bg-white p-8 rounded-lg shadow-md border-b-2 border-gray-100">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">
                            <i class="fas fa-pencil-alt mr-2 text-gray-500"></i> Actualizar Artículo
                        </h2>
                        <div>
                            <label for="title" class="block text-gray-700 text-sm font-semibold mb-2">
                                <i class="fas fa-heading mr-1 text-gray-500"></i> Título del Artículo:
                            </label>
                            <div class="relative">
                                <input type="text" id="title" name="title" wire:model="uform.title"
                                    class="block w-full px-4 py-2 mt-1 text-gray-900 bg-gray-50 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-200"
                                    placeholder="Título impactante">
                            </div>
                            <x-input-error for="uform.title"></x-input-error>
                        </div>

                        <div class="mt-6">
                            <label for="content" class="block text-gray-700 text-sm font-semibold mb-2">
                                <i class="fas fa-paragraph mr-1 text-gray-500"></i> Contenido Principal:
                            </label>
                            <div class="relative">
                                <textarea id="content" name="content" rows="5" wire:model="uform.content"
                                    class="block w-full px-4 py-2 mt-1 text-gray-900 bg-gray-50 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-200"
                                    placeholder="Desarrolla tu artículo..."></textarea>
                            </div>
                            <x-input-error for="uform.content"></x-input-error>
                        </div>

                        <div class="mt-6 mb-8">
                            <label for="tags" class="block text-gray-700 text-sm font-semibold mb-2">
                                <i class="fas fa-tags mr-1 text-gray-500"></i> Etiquetas Temáticas:
                            </label>
                            <div class="relative">
                                <select id="tag" name="tag" wire:model="uform.tag_id"
                                    class="block w-full px-4 py-2 mt-1 text-gray-900 bg-gray-50 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-200">
                                    <option value="-1">Selecciona etiqueta</option>
                                    @foreach ($tags as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <x-input-error for="uform.tag_id"></x-input-error>
                        </div>

                        <div class="flex justify-end mt-8 space-x-4">
                            <button type="reset" wire:click="cancelar"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500">
                                <i class="fas fa-ban mr-2"></i>Cancelar
                            </button>
                            <button type="submit" wire:click="update" wire:loading.attr="disable"
                                class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <i class="fas fa-paper-plane mr-2"></i>Publicar
                            </button>
                        </div>
                    </div>
                </x-slot>
                ```
                <x-slot name="footer">

                </x-slot>
            </x-dialog-modal>
        @endisset

        <!---------------------------------------Modal para detalle-------------------------------------->
        @isset($articleDetalle)
            <x-dialog-modal wire:model="openDetalle">
                <x-slot name="title">
                    <div class="text-2xl font-semibold text-gray-900 border-b pb-2">
                        {{-- Puedes descomentar la siguiente línea si quieres mostrar el título dinámicamente.  --}}
                        {{-- {{ $postDetalle->titulo ?? 'Detalle del Post' }} --}}
                        Detalle del Articulo
                    </div>
                </x-slot>

                <x-slot name="content">
                    <div class="rounded-lg overflow-hidden">
                        {{-- Contenedor principal, se eliminó la sombra extra --}}
                        <div class="px-6 py-4">

                            {{-- Título --}}
                            <h2 class="text-3xl font-bold text-gray-800 mb-3">{{$articleDetalle->title}}</h2>

                            {{-- Contenido --}}
                            <p class="text-gray-600 text-base leading-relaxed mb-4">
                                {{$articleDetalle->content}}
                            </p>

                            {{-- Detalles (Categoría y Fecha) --}}
                            <div class="mt-4">
                                {{-- Categoría --}}
                                <div class="mb-2">
                                    <span class="text-sm font-medium text-gray-500">Tag:</span>
                                    <span class="text-sm text-blue-600 font-semibold">{{$articleDetalle->tag->name}}</span>
                                </div>

                                {{-- Fecha de actualización --}}
                                <div>
                                    <span class="text-sm font-medium text-gray-500">Última actualización:</span>
                                    <span
                                        class="text-sm text-gray-700">{{ $articleDetalle->updated_at->format('d/m/Y, H:i:s') ?? 'N/A' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </x-slot>

                <x-slot name="footer">
                    <div class="flex justify-end">
                        <x-button wire:click="cerrarDetalle"
                            class="px-6 py-2 text-sm font-semibold text-white bg-blue-500 hover:bg-blue-600 rounded-md transition duration-300 ease-in-out">
                            Cerrar
                        </x-button>
                    </div>
                </x-slot>
            </x-dialog-modal>
        @endisset
    </div>
</x-self.base>
