<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Título de la página -->
    <title>{{ config('app.name', 'Laravel') }} - Admin Layout</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/backend/favicons/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Iconos de Font Awesome -->
    <script src="https://kit.fontawesome.com/8c5fb25a16.js" crossorigin="anonymous"></script>

    <!-- Enlaces CSS y Scripts de Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Estilos de Livewire -->
    @livewireStyles
</head>

<body>
    <!-- Contenedor principal -->
    <div x-data="{ sidebarOpen: false, isLoading: false }" class="flex h-screen bg-gray-200 font-roboto">
        
        <!-- Sidebar fijo -->
        @include('layouts.partials.admin.sidebar')

        <!-- Contenedor del contenido -->
        <div class="flex-1 flex flex-col overflow-hidden">
            
            <!-- Barra de navegación fija -->
            @include('layouts.partials.admin.navigation')

           <!-- Preloader -->
           <div 
           x-show="isLoading" 
           id="preloader" 
           class="fixed inset-0 bg-white flex items-center justify-center z-50"
           x-transition:enter="transition-opacity ease-in duration-300"
           x-transition:leave="transition-opacity ease-out duration-300">
           <x-loading-admin />
       </div>

            <!-- Contenido principal -->
            <main x-bind:class="{ 'opacity-50 pointer-events-none': isLoading }" class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                <div class="container mx-auto px-6 py-8">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    <!-- Scripts de Livewire -->
    @livewireScripts

</body>

</html>
