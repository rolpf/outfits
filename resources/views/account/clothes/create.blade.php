<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register your cloth') }}
        </h2>
    </x-slot>

    <x-container class="py-8">
        <form method="POST" action="{{ route('account.clothes.store') }}" enctype="multipart/form-data">
            @csrf
            <label>
                <p>{{ __('Name of the cloth') }}</p>
                <input type="text" name="name">
                @error('name')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </label>
            <input type="file" name="thumbnail">
            @error('thumbnail')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
            <x-select2 fieldName="brand" :items="\App\Models\Brand::all()" />
            <input type="submit" value="Create">
        </form>
    </x-container>
</x-app-layout>
