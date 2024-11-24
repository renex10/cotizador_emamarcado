@php
    $links = [
        [
            'icon' => 'fas fa-tachometer-alt w-6 h-6',
            'name' => 'Dashboard',
            'route' => 'admin.dashboard',
            'active' => request()->routeIs('admin.dashboard'),
        ],
    ];

    $materials = [
        [
            'name' => 'Póster',
            'route' => 'admin.poster',
            'icon' => 'fas fa-image w-6 h-6',
            'active' => request()->routeIs('admin.poster'),
        ],
        [
            'name' => 'Lám. v. s (Lámina en vidrio simple)',
            'route' => 'admin.laminaVidrioSimple',
            'icon' => 'fas fa-glass-martini-alt w-6 h-6',
            'active' => request()->routeIs('admin.laminaVidrioSimple'),
        ],
        [
            'name' => 'Lám. v. d (Lámina en vidrio doble)',
            'route' => 'admin.laminaVidrioDoble',
            'icon' => 'fas fa-glass-martini-alt w-6 h-6',
            'active' => request()->routeIs('admin.laminaVidrioDoble'),
        ],
        [
            'name' => 'Lám. pp. y v.s (Lámina con paspartú y vidrio simple)',
            'route' => 'admin.laminaPaspartuVidrioSimple',
            'icon' => 'fas fa-glass-martini-alt w-6 h-6',
            'active' => request()->routeIs('admin.laminaPaspartuVidrioSimple'),
        ],
        [
            'name' => 'Lám. pp y v.d (Lámina con paspartú y vidrio doble)',
            'route' => 'admin.laminaPaspartuVidrioDoble',
            'icon' => 'fas fa-glass-martini-alt w-6 h-6',
            'active' => request()->routeIs('admin.laminaPaspartuVidrioDoble'),
        ],
        [
            'name' => 'Bastidor',
            'route' => 'admin.bastidor',
            'icon' => 'fas fa-ruler-combined w-6 h-6',
            'active' => request()->routeIs('admin.bastidor'),
        ],
        [
            'name' => 'Tela',
            'route' => 'admin.tela',
            'icon' => 'fas fa-tshirt w-6 h-6',
            'active' => request()->routeIs('admin.tela'),
        ],

        [
            'name' => 'Tela con Pppt',
            'route' => 'admin.telappt',
            'icon' => 'fas fa-tshirt w-6 h-6',
            'active' => request()->routeIs('admin.telappt'),
        ],

        'lam.foam-V.O (Lámina en foam con vidrio opaco)',
        'lám.foam-V.S (Lámina en foam con vidrio simple)',
        'Entrev. (Entrevista)',
        'E. Planos (Enmarcado de planos)',
        'E. Biselado (Enmarcado biselado)',
        'Vidrios',

        // Otros materiales
    ];
@endphp

<div x-cloak :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
    class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>

<div x-cloak :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
    class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-gray-900 lg:translate-x-0 lg:static lg:inset-0">
    <div class="flex items-center justify-center mt-8">
        <div class="flex items-center">
            <span class="mx-2 text-2xl font-semibold text-white">Admin Dashboard</span>
        </div>
    </div>

    <nav class="mt-10">
        @foreach ($links as $link)
            <a class="flex items-center px-6 py-2 mt-4 text-gray-100 bg-gray-700 bg-opacity-25 {{ $link['active'] ? 'bg-gray-200' : '' }}"
                href="{{ route($link['route']) }}">
                <i class="{{ $link['icon'] }}"></i>
                <span class="mx-3">{{ $link['name'] }}</span>
            </a>
        @endforeach

        <!-- Menú desplegable de Materiales -->
        <div x-data="{ open: true }" class="mt-4">
            <button @click="open = !open"
                class="flex items-center px-6 py-2 text-gray-100 bg-gray-700 bg-opacity-25 w-full">
                <i class="fas fa-box-open w-6 h-6"></i>
                <span class="mx-3">Materiales</span>
                <svg fill="currentColor" viewBox="0 0 20 20" :class="open ? 'rotate-180' : 'rotate-0'"
                    class="inline w-4 h-4 mt-1 ml-2 transition-transform duration-200 transform">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 011.414 0L10 10.586l3.293-3.293a1 1 111.414 1.414l-4 4a1 1 01-1.414 0l-4-4a1 1 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div x-show="open" class="pl-8 mt-2 space-y-2">
                @foreach ($materials as $material)
                    @if (is_array($material))
                        <a class="flex items-center px-4 py-2 text-gray-200 bg-gray-700 bg-opacity-25 rounded-lg {{ $material['active'] ? 'bg-gray-200' : '' }}"
                            href="{{ route($material['route']) }}">
                            <i class="{{ $material['icon'] }}"></i>
                            <span class="mx-3">{{ $material['name'] }}</span>
                        </a>
                    @else
                        <a class="flex items-center px-4 py-2 text-gray-200 bg-gray-700 bg-opacity-25 rounded-lg">
                            <i class="fas fa-angle-right w-4 h-4"></i>
                            <span class="mx-3">{{ $material }}</span>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </nav>
</div>
