<!-- resources/views/cms/modal_settings.blade.php -->

<x-cms-layout>
    <div class="container mx-auto py-12">
        <h1 class="text-2xl font-bold mb-4">Configuración del Modal</h1>

        @if (session('status'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('cms.modal-settings.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="flex items-center">
                    <input type="checkbox" name="modal_active" class="form-checkbox" {{ $modalSetting->modal_active ? 'checked' : '' }}>
                    <span class="ml-2">Activar Modal Informativo</span>
                </label>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
        </form>
    </div>
</x-cms-layout>
