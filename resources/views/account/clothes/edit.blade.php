<x-app-layout>
    <x-container class="py-8">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight lg:my-8">
            {{ __('Edit your cloth') }}
        </h2>
        <form method="POST" action="{{ route('account.clothes.update', $cloth) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label>
                <input value="{{ $cloth->name }}" type="text" name="name" placeholder="{{ __('Name of the cloth') }}" class="my-4 w-full">
                @error('name')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </label>
            <label for='thumbnail' class="block w-fit">
                <p class="border rounded shadow-sm bg-white px-8 py-2 my-2 font-semibold w-fit">{{ __('Add a picture') }}</p>
                <input type="file" name="thumbnail" id="thumbnail" class="hidden">
                @error('thumbnail')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
            </label>
            <livewire:select-brand :selected-brand="$cloth->brand->first()?->id"  />
            <livewire:select-cloth-category :selected-category="$cloth->category->first()?->id" />
            <input type="submit" value="Update" class="border rounded shadow-sm bg-white w-full px-16 py-4 font-semibold my-2">
        </form>
    </x-container>
</x-app-layout>
