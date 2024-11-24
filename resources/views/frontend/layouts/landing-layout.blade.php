<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Iconos de Font Awesome -->
    <script src="https://kit.fontawesome.com/8c5fb25a16.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="bg-gradient-to-r from-violet-200 to-pink-200">

    <!-- Incluir el preloader aquí -->
    @include('components.preloader-loading')

    @livewire('frontend.layouts.partials.livewire.navigation')

    <div class="min-h-screen">

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')
    @include('components.footer')
    @livewireScripts

    <!-- Script para ocultar el preloader después de cargar la página con una transición suave -->
    <script>
        window.addEventListener('load', () => {
            const preloader = document.getElementById('preloader');
            if (preloader) {
                setTimeout(() => {
                    preloader.classList.add('opacity-0');
                    setTimeout(() => {
                        preloader.style.display = 'none';
                    }, 300); // Tiempo de la transición en ms
                }, 500); // 500 ms adicional de carga
            }
        });
    </script>
</body>

</html>
