<x-guest-layout>
    <div class="bg-gray-100 flex h-screen items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div class="bg-white shadow-md rounded-md p-6">
                
                <!-- Imagen de usuario -->
                <img class="mx-auto h-12 w-auto" src="https://www.svgrepo.com/show/499664/user-happy.svg" alt="User Icon" />
    
                <!-- Título -->
                <h2 class="my-3 text-center text-3xl font-bold tracking-tight text-gray-900">
                    Sign up for an account
                </h2>
    
                <!-- Mostrar errores de validación -->
                @if ($errors->any())
                    <div class="mb-4">
                        <ul class="text-red-500 text-sm list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
    
                <!-- Formulario de Registro -->
                <form class="space-y-6" method="POST" action="{{ route('register') }}">
                    @csrf
    
                    <!-- Campo Nombre -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <div class="mt-1">
                            <input name="name" id="name" type="text" required autofocus autocomplete="name" value="{{ old('name') }}"
                                class="px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
                        </div>
                    </div>
    
                    <!-- Campo Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <div class="mt-1">
                            <input name="email" id="email" type="email" required autocomplete="username" value="{{ old('email') }}"
                                class="px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
                        </div>
                    </div>
    
                    <!-- Campo Contraseña -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="mt-1">
                            <input name="password" id="password" type="password" required autocomplete="new-password"
                                class="px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
                        </div>
                    </div>
    
                    <!-- Campo Confirmación de Contraseña -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                        <div class="mt-1">
                            <input name="password_confirmation" id="password_confirmation" type="password" required autocomplete="new-password"
                                class="px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
                        </div>
                    </div>
    
                    <!-- Botón de Registro -->
                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md border border-transparent bg-sky-400 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-opacity-75 focus:outline-none focus:ring-2 focus:ring-sky-400 focus:ring-offset-2">
                            Register Account
                        </button>
                    </div>
    
                    <!-- Link a iniciar sesión si ya está registrado -->
                    <div class="text-center mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</x-guest-layout>
