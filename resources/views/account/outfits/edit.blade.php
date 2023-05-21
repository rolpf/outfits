<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit your outfit') }}
        </h2>
    </x-slot>

    <x-container class="py-8">
        <form method="POST" action="{{ route('account.outfits.update', $outfit) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label>
                <p>{{ __('Name of the outfit') }}</p>
                <input type="text" name="name" value="{{ $outfit->name }}">
                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </label>
            <input type="file" name="thumbnail">
            @error('thumbnail')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
            <livewire:clothes-select :existingClothes="$outfit->clothes()->get()" />
            <input type="submit" value="Update">
        </form>
    </x-container>
</x-app-layout>