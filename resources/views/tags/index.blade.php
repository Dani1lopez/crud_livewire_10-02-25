<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestión de Tags
        </h2>
    </x-slot>

    <x-self.base>
        <div class="flex flex-row-reverse mb-4">
            <a href="{{ route('tags.create') }}"
                class="flex items-center gap-2 px-4 py-2 rounded-xl font-bold text-white bg-gradient-to-r from-teal-500 to-blue-500 shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                <i class="fas fa-plus"></i>
                <span>Nuevo Tag</span>
            </a>
        </div>

        <div class="relative shadow-lg sm:rounded-lg bg-white/70 backdrop-blur-md p-6">
            <table class="w-full text-sm text-left text-gray-700 border-collapse">
                <thead class="text-xs font-semibold uppercase text-gray-100 bg-gradient-to-r from-teal-500 to-blue-600">
                    <tr>
                        <th scope="col" class="px-6 py-3 rounded-tl-md">Nombre</th>
                        <th scope="col" class="px-6 py-3">Descripción</th>
                        <th scope="col" class="px-6 py-3">Color</th>
                        <th scope="col" class="px-6 py-3 rounded-tr-md">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tags as $tag)
                        <tr class="bg-white border-b hover:bg-gray-50 transition-colors duration-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $tag->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $tag->description ?? 'Sin descripción' }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="h-6 w-6 rounded-full" style="background-color: {{ $tag->color }};"></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <a href="{{ route('tags.edit', $tag) }}"
                                    class="text-blue-500 hover:text-blue-700 mr-3"><i class="fas fa-edit"></i></a>

                                <form action="{{ route('tags.destroy', $tag) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700"
                                        onclick="return confirm('¿Estás seguro de eliminar este tag?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">No hay tags disponibles.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-self.base>
    @session('mensaje')
        <script>
            Swal.fire({
                icon: "success",
                title: "{{ session('mensaje') }}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endsession
</x-app-layout>
