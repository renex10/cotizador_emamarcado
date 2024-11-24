<!-- resources/views/cms/partials/sidebar.blade.php -->

@php
    $links = [
        [
            'icon' => 'fas fa-tachometer-alt w-6 h-6',
            'name' => 'Dashboard',
            'route' => 'cms.dashboard',
            'active' => request()->routeIs('cms.dashboard'),
        ],
        // Otros enlaces...
        [
            'icon' => 'fas fa-bell w-6 h-6',
            'name' => 'Config. del Modal',
            'route' => 'cms.modal-settings',
            'active' => request()->routeIs('cms.modal-settings'),
        ],
        [
            'icon' => 'fas fa-image w-6 h-6',
            'name' => 'Hero Settings',
            'route' => 'cms.hero-settings',
            'active' => request()->routeIs('cms.hero-settings'),
        ],
    ];
@endphp

<div x-cloak :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
    class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>

<div x-cloak :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
    class="fixed top-0 left-0 h-screen z-30 w-64 overflow-y-auto transition duration-300 transform bg-gray-900 lg:translate-x-0 lg:inset-0">
    <div class="flex items-center justify-center mt-8">
        <div class="flex items-center">
            <span class="mx-2 text-2xl font-semibold text-white">Admin Dashboard</span>
        </div>
    </div>

    <nav class="mt-10 flex flex-col">
        @foreach ($links as $link)
            <a class="flex items-center px-6 py-2 mt-4 text-gray-100 bg-gray-700 bg-opacity-25 {{ $link['active'] ? 'bg-gray-200' : '' }}"
                href="{{ route($link['route']) }}">
                <i class="{{ $link['icon'] }}"></i>
                <span class="mx-3">{{ $link['name'] }}</span>
            </a>
        @endforeach
    </nav>
</div>
