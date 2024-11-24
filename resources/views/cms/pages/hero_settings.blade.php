<!-- resources/views/cms/pages/hero_settings.blade.php -->

<x-cms-layout>
    <div class="container mx-auto py-12">
        <h1 class="text-2xl font-bold mb-4">Hero Section Configuration</h1>

        @if (session('status'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('cms.hero-settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="background_image" class="block text-gray-700">Background Image</label>
                <input type="file" name="background_image" id="background_image" class="form-input mt-1 block w-full">
                @if ($heroSetting && $heroSetting->background_image)
                    <img src="{{ asset('storage/' . $heroSetting->background_image) }}" alt="Hero Background" class="mt-2">
                @endif
            </div>

            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="form-input mt-1 block w-full" value="{{ $heroSetting ? $heroSetting->title : '' }}">
            </div>

            <div class="mb-4">
                <label for="subtitle" class="block text-gray-700">Subtitle</label>
                <textarea name="subtitle" id="subtitle" class="form-textarea mt-1 block w-full">{{ $heroSetting ? $heroSetting->subtitle : '' }}</textarea>
            </div>

            <div class="mb-4">
                <label for="button_text" class="block text-gray-700">Button Text</label>
                <input type="text" name="button_text" id="button_text" class="form-input mt-1 block w-full" value="{{ $heroSetting ? $heroSetting->button_text : '' }}">
            </div>

            <div class="mb-4">
                <label for="button_url" class="block text-gray-700">Button URL</label>
                <input type="text" name="button_url" id="button_url" class="form-input mt-1 block w-full" value="{{ $heroSetting ? $heroSetting->button_url : '' }}">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        </form>
    </div>
</x-cms-layout>
