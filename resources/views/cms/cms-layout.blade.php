<!-- resources/views/cms/cms-layout.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CMS Dashboard') }}</title>

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

@php $modalSetting = \App\Models\ModalSetting::first(); @endphp
<body class="bg-gray-100 flex" x-data="{ sidebarOpen: false, showModal: {{ $modalSetting && $modalSetting->modal_active ? 'true' : 'false' }} }" @load.window="setTimeout(() => showModal = true, 10000);">

    <!-- Sidebar -->
    @include('cms.partials.sidebar')

    <!-- Contenido Principal -->
    <div class="flex-1 flex flex-col items-center justify-center p-8 ml-64">
        <div class="w-full max-w-6xl">
            {{ $slot }}
        </div>
    </div>

    <!-- Modal -->
    @if ($modalSetting && $modalSetting->modal_active)
    <div x-show="showModal" x-transition class="fixed inset-0 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded shadow-lg max-w-lg w-full">
            <div class="flex justify-between items-center border-b pb-3">
                <h2 class="text-xl font-semibold">{{ $modalSetting->title }}</h2>
                <button @click="showModal = false" class="text-gray-600 hover:text-gray-800">&times;</button>
            </div>
            <div class="mt-4">
                @if ($modalSetting->image_path)
                    <img src="{{ asset('storage/' . $modalSetting->image_path) }}" alt="Modal Image" class="mb-4">
                @endif
                <p>{{ $modalSetting->content }}</p>
            </div>
        </div>
    </div>
    @endif

    @livewireScripts

    <!-- Script para cerrar el modal automáticamente después de 10 segundos -->
    <script>
        window.addEventListener('load', () => {
            setTimeout(() => {
                if (showModal) {
                    setTimeout(() => {
                        showModal = false;
                    }, 10000); // 10 segundos visible
                }
            }, 10000); // Espera inicial de 10 segundos
        });
    </script>
</body>

</html>
