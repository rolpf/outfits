<x-app-layout>
    <x-container class="py-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit your cloth') }}
        </h2>
        <form method="POST" action="{{ route('account.clothes.update', $cloth) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label>
                <p>{{ __('Name of the cloth') }}</p>
                <input value="{{ $cloth->name }}" type="text" name="name">
                @error('name')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </label>
            <input type="file" name="thumbnail">
            @error('thumbnail')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
            <livewire:select-brand :selected-brand="$cloth->brand->first()?->id"  />
            <livewire:select-cloth-category :selected-category="$cloth->category->first()?->id" />
            <input type="submit" value="Update">
        </form>
    </x-container>
</x-app-layout>
