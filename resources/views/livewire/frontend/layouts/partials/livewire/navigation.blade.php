<nav 
    x-data="{ open: false, scrolled: false }" 
    x-init="$watch('scrolled', value => { 
        if (value) { 
            $el.classList.add('bg-gray-100'); 
            $el.querySelectorAll('.menu-item').forEach(item => item.classList.add('text-gray-900'));
        } else { 
            $el.classList.remove('bg-gray-100'); 
            $el.querySelectorAll('.menu-item').forEach(item => item.classList.remove('text-gray-900'));
        }
    })"
    @scroll.window="scrolled = window.scrollY > 10" 
    class="fixed w-full top-0 left-0 z-50 flex items-center justify-between sm:h-10 md:justify-center py-6 px-4 transition duration-300 ease-in-out">
    
    <!-- Logo y menú móvil -->
    <div class="flex items-center flex-1 md:absolute md:inset-y-0 md:left-0">
        <div class="flex items-center justify-between w-full md:w-auto">
            <!-- Logo -->
            <a href="#" aria-label="Home">
                <img src="https://www.svgrepo.com/show/491978/gas-costs.svg" height="40" width="40" />
            </a>
            <!-- Botón menú móvil -->
            <div class="-mr-2 flex items-center md:hidden">
                <button 
                    @click="open = !open" 
                    type="button" 
                    aria-label="Main menu" 
                    aria-haspopup="true" 
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg stroke="currentColor" fill="none" viewBox="0 0 24 24" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Menú principal -->
    <div class="hidden md:flex md:space-x-10">
        <a href="{{ route('frontend.index') }}" class="menu-item font-medium text-gray-200 hover:text-gray-900 transition duration-150 ease-in-out">Inicio</a>
        <a href="{{ route('frontend.productos') }}" class="menu-item font-medium text-gray-200 hover:text-gray-900 transition duration-150 ease-in-out">Nuestros Productos</a>
        <a href="/blog" class="menu-item font-medium text-gray-200 hover:text-gray-900 transition duration-150 ease-in-out">Galería</a>
        <a href="{{ route('frontend.contacto') }}" class="menu-item font-medium text-gray-200 hover:text-gray-900 transition duration-150 ease-in-out">Contactos</a>
    </div>

    <!-- Botones adicionales -->
    <div class="hidden md:absolute md:flex md:items-center md:justify-end md:inset-y-0 md:right-0">
        <span class="inline-flex">
            <a href="/login" class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium text-blue-600 hover:text-blue-500 focus:outline-none transition duration-150 ease-in-out">
              Login
            </a>
        </span>
        <span class="inline-flex rounded-md shadow ml-2">
            <a href="/signup" class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:border-blue-700 transition duration-150 ease-in-out">
               Get started
            </a>
        </span>
    </div>

    <!-- Menú desplegable para dispositivos pequeños -->
    <div 
        x-show="open" 
        @click.away="open = false" 
        class="fixed top-0 inset-x-0 bg-white shadow-md z-50 md:hidden">
        <div class="flex flex-col space-y-2 py-4 px-6">
            <a href="#features" class="menu-item font-medium text-gray-700 hover:text-gray-900 transition duration-150 ease-in-out">Inicio</a>
            <a href="#pricing" class="menu-item font-medium text-gray-700 hover:text-gray-900 transition duration-150 ease-in-out">Nuestros Productos</a>
            <a href="/blog" class="menu-item font-medium text-gray-700 hover:text-gray-900 transition duration-150 ease-in-out">Galería</a>
            <a href="{{ route('frontend.contacto') }}" class="menu-item font-medium text-gray-700 hover:text-gray-900 transition duration-150 ease-in-out">Contactos</a>
            <a href="/login" class="menu-item font-medium text-blue-600 hover:text-blue-500 transition duration-150 ease-in-out">Login</a>
            <a href="/signup" class="menu-item font-medium text-white bg-blue-600 hover:bg-blue-500 text-center py-2 rounded-md">Get started</a>
        </div>
    </div>
</nav>
