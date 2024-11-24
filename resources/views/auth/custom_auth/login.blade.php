<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <!-- Contenedor principal -->
        <div class="max-w-md w-full p-6 rounded-md shadow-lg backdrop-blur-md bg-white/70 border border-gray-200 dark:bg-gray-800/70 dark:border-gray-700">
            <div class="mb-8 text-center">
                <h1 class="my-3 text-4xl font-bold text-gray-900 dark:text-white">Sign in</h1>
                <p class="text-sm text-gray-700 dark:text-gray-400">Sign in to access your account</p>
            </div>
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <div class="space-y-4">
                    <!-- Campo de Email -->
                    <div>
                        <label for="email" class="block mb-2 text-sm text-gray-800 dark:text-gray-200">Email address</label>
                        <input type="email" name="email" id="email" placeholder="leroy@jenkins.com"
                            class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring-violet-500 focus:border-violet-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200" required>
                    </div>
                    <!-- Campo de Contraseña -->
                    <div>
                        <div class="flex justify-between mb-2">
                            <label for="password" class="text-sm text-gray-800 dark:text-gray-200">Password</label>
                            <a href="{{ route('password.request') }}" class="text-xs hover:underline text-violet-600 dark:text-violet-400">Forgot password?</a>
                        </div>
                        <input type="password" name="password" id="password" placeholder="*****"
                            class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring-violet-500 focus:border-violet-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200" required>
                    </div>
                </div>
                <!-- Botón de Inicio de Sesión -->
                <div>
                    <button type="submit"
                        class="w-full px-4 py-2 font-semibold text-white bg-violet-600 rounded-md shadow hover:bg-violet-700 focus:ring-4 focus:ring-violet-300 dark:bg-violet-500 dark:hover:bg-violet-600 dark:focus:ring-violet-900">
                        Sign in
                    </button>
                </div>
                <!-- Enlace para registrarse -->
                <p class="text-sm text-center text-gray-700 dark:text-gray-400">
                    Don't have an account yet?
                    <a href="{{ route('register') }}" class="hover:underline text-violet-600 dark:text-violet-400">Sign up</a>.
                </p>
            </form>
        </div>
    </div>
</x-guest-layout>
