<div>
    <x-button wire:click="$set('openCrear',true)"
        class="inline-flex items-center justify-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-white font-bold rounded-lg shadow-md transition duration-200 ease-in-out">
        <i class="fas fa-plus mr-2 text-lg"></i> <!-- Cambiamos "fa-add" por "fa-plus" ya que es más común -->
        NUEVO
    </x-button>
    <x-dialog-modal wire:model="openCrear">
        <x-slot name="title">

        </x-slot>
        <x-slot name="content">
            <div class="bg-white p-8 rounded-lg shadow-md border-b-2 border-gray-100">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">
                    <i class="fas fa-pencil-alt mr-2 text-gray-500"></i> Crear Nuevo Artículo
                </h2>
                <div>
                    <label for="title" class="block text-gray-700 text-sm font-semibold mb-2">
                        <i class="fas fa-heading mr-1 text-gray-500"></i> Título del Artículo:
                    </label>
                    <div class="relative">
                        <input type="text" id="title" name="title"
                            class="block w-full px-4 py-2 mt-1 text-gray-900 bg-gray-50 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-200"
                            placeholder="Título impactante">
                    </div>
                </div>

                <div class="mt-6">
                    <label for="content" class="block text-gray-700 text-sm font-semibold mb-2">
                        <i class="fas fa-paragraph mr-1 text-gray-500"></i> Contenido Principal:
                    </label>
                    <div class="relative">
                        <textarea id="content" name="content" rows="5"
                            class="block w-full px-4 py-2 mt-1 text-gray-900 bg-gray-50 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-200"
                            placeholder="Desarrolla tu artículo..."></textarea>
                    </div>
                </div>

                <div class="mt-6 mb-8">
                    <label for="tags" class="block text-gray-700 text-sm font-semibold mb-2">
                        <i class="fas fa-tags mr-1 text-gray-500"></i> Etiquetas Temáticas:
                    </label>
                    <div class="relative">
                        <select id="tags" name="tags"
                            class="block w-full px-4 py-2 mt-1 text-gray-900 bg-gray-50 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-200">
                            <option value="">Selecciona etiqueta</option>
                            <option value="tecnologia">Tecnología</option>
                            <option value="ciencia">Ciencia</option>
                            <option value="opinion">Opinión</option>
                            <option value="tutorial">Tutoriales</option>
                            <option value="otro">Otros</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-end mt-8 space-x-4">
                    <button type="reset"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500">
                        <i class="fas fa-ban mr-2"></i>Cancelar
                    </button>
                    <button type="reset" id="resetButton"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-blue-100 rounded-md hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <i class="fas fa-sync-alt mr-2"></i>Resetear
                    </button>
                    <button type="submit"
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
</div>
