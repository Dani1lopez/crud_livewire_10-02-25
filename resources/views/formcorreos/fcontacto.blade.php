<x-app-layout>
    <x-self.base>
        <div class="flex justify-center items-start bg-gray-100 min-h-screen pt-24 px-4 sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
                <h1 class="text-2xl font-bold mb-6 text-center text-gray-700">
                    <i class="fas fa-envelope mr-2"></i>Contáctanos
                </h1>
                <form action="{{route('contacto.procesar')}}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                            <i class="fas fa-user mr-2"></i>Nombre:
                        </label>
                        <input type="text" id="name" name="name"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent placeholder-gray-400"
                            placeholder="Tu nombre completo">
                        <p class="text-red-500 text-xs italic mt-1 hidden" id="name-error"></p>
                    </div>
                    <x-input-error for="name"></x-input-error>
                    @guest
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                            <i class="fas fa-envelope mr-2"></i>Correo Electrónico:
                        </label>
                        <input type="email" id="email" name="email"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent placeholder-gray-400"
                            placeholder="tucorreo@ejemplo.com">
                        <p class="text-red-500 text-xs italic mt-1 hidden" id="email-error"></p>
                    </div> 
                    <x-input-error for="email"></x-input-error>                   
                    @endguest
                    <div class="mb-6">
                        <label for="body" class="block text-gray-700 text-sm font-bold mb-2">
                            <i class="fas fa-comment-alt mr-2"></i>Mensaje:
                        </label>
                        <textarea id="body" name="body" rows="5"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none placeholder-gray-400"
                            placeholder="Escribe tu mensaje aquí..."></textarea>
                        <p class="text-red-500 text-xs italic mt-1 hidden" id="body-error"></p>
                    </div>
                    <x-input-error for="body"></x-input-error>
                    <div class="flex items-center justify-between mt-4">
                        <button type="button"
                            class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 transition duration-150 ease-in-out"
                            onclick="handleCancel()">
                            <i class="fas fa-times mr-1"></i>Cancelar
                        </button>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-150 ease-in-out">
                            <i class="fas fa-paper-plane mr-1"></i>Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-self.base>
</x-app-layout>
