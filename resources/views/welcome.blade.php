<x-app-layout>
    <x-self.base>
        <!-- Contenedor principal -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Título con efecto de gradiente y animación suave -->
            <h1 
                class="text-4xl md:text-5xl font-extrabold text-gray-800 mb-12 text-center relative overflow-hidden tracking-tight"
            >
                <span class="relative z-10">Últimas Publicaciones</span>
                <span class="absolute inset-0 bg-gradient-to-r from-indigo-500 to-purple-500 opacity-20 blur-md"></span>
            </h1>

            <!-- Cuadrícula de publicaciones -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($articulos as $item)
                    <article 
                        class="group relative h-96 rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 ease-in-out cursor-pointer transform hover:-translate-y-1 hover:scale-[1.02] fade-in"
                    >
                        <!-- Imagen de fondo con zoom al hover -->
                        <div 
                            class="absolute inset-0 bg-cover bg-center bg-no-repeat transition-transform duration-300 transform group-hover:scale-110"
                            style="background-image: url('{{ $item->image ?? 'https://via.placeholder.com/400' }}'); filter: brightness(50%);"
                        ></div>

                        <!-- Capa de oscurecido dinámico -->
                        <div 
                            class="absolute inset-0 bg-black bg-opacity-40 group-hover:bg-opacity-60 transition-colors duration-300"
                        ></div>

                        <!-- Contenido del frente -->
                        <div class="relative z-10 p-6 flex flex-col justify-between h-full">
                            <div>
                                <!-- Etiqueta / Categoría -->
                                <span 
                                    class="inline-block px-3 py-1 text-xs font-semibold rounded-full text-white shadow-sm" 
                                    style="background-color: {{ $item->tag->color }}"
                                >
                                    {{ $item->tag->name }}
                                </span>

                                <!-- Título -->
                                <h2 class="mt-4 text-xl md:text-2xl font-semibold text-white line-clamp-2">
                                    {{ $item->title }}
                                </h2>

                                <!-- Descripción -->
                                <p class="mt-2 text-sm text-gray-200 line-clamp-3">
                                    {{ $item->content }}
                                </p>
                            </div>

                            <!-- Fecha y botón -->
                            <div class="flex items-center justify-between text-sm mt-4">
                                <time 
                                    datetime="{{ $item->updated_at->format('Y-m-d') }}" 
                                    class="text-gray-300"
                                >
                                    {{ $item->updated_at->format('d M Y') }}
                                </time>
                                <button class="text-indigo-200 hover:text-indigo-50 font-medium transition-colors duration-200">
                                    Ver detalles →
                                </button>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Paginación -->
            <div class="mt-12 flex justify-center">
                {{ $articulos->links() }}
            </div>
        </div>

        <!-- Estilos y animaciones personalizadas -->
        <style>
            /* Efecto de entrada (fade-in) */
            .fade-in {
                opacity: 0;
                transform: translateY(20px);
                animation: fadeIn 0.8s forwards ease-in-out;
            }

            @keyframes fadeIn {
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            /* Mejora de paginación (clases si las usa Laravel por defecto) */
            .pagination {
                display: flex;
                justify-content: center;
                gap: 0.5rem;
            }

            .pagination .page-link {
                padding: 0.5rem 1rem;
                border-radius: 9999px;
                background-color: #f3f4f6;
                color: #4b5563;
                transition: all 0.3s ease-in-out;
            }

            .pagination .page-link:hover,
            .pagination .page-item.active .page-link {
                background-color: #6366f1;
                color: white;
            }
        </style>

        <!-- Script para animación secuencial en tarjetas -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const cards = document.querySelectorAll('.group');
                cards.forEach((card, index) => {
                    setTimeout(() => {
                        card.classList.add('fade-in');
                    }, index * 150); // Retraso progresivo en cada card
                });
            });
        </script>
        @session('mensaje')
        <script>
            Swal.fire("{{session('mensaje')}}");
        </script>
        @endsession
    </x-self.base>
</x-app-layout>
