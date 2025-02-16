<x-app-layout>
    <x-self.base>
        <div class="max-w-md mx-auto mt-8 bg-gray-100 border border-gray-300 shadow-2xl p-6 rounded-2xl">
            <form action="{{ route('tags.store') }}" method="POST">
                @csrf
                <h2 class="text-2xl font-bold mb-4">Crear Nuevo Tag</h2>
                <div class="mb-4">
                    <label for="name" class="block mb-2 text-sm font-bold text-gray-700">
                        Nombre
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Nombre del Tag" />
                    <x-input-error for="name" />
                </div>
                <div class="mb-4">
                    <label for="description" class="block mb-2 text-sm font-bold text-gray-700">
                        Descripción
                    </label>
                    <textarea id="description" name="description" rows="4"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Descripción del Tag">{{ old('description') }}</textarea>
                    <x-input-error for="description" />
                </div>
                <div class="mb-4">
                    <label for="color" class="block mb-2 text-sm font-bold text-gray-700">
                        Color
                    </label>
                    <input type="color" id="color" name="color" value="{{ old('color', '#4F46E5') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    <x-input-error for="color" />
                </div>
                <div class="flex justify-end gap-4">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Guardar
                    </button>
                    <a href="{{ route('tags.index') }}"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </x-self.base>
</x-app-layout>