<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 lg:mx-56">
            <h1 class="my-8 text-3xl font-semibold">{{ __("Send a post") }}</h1>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form method="POST" action="{{ route('post.store') }}">
                    @csrf
                    <div x-data="{ open: false}">
                        <button @click.prevent="open = ! open" class="block border rounded shadow-sm bg-white px-8 py-2 my-2 font-semibold"> {{ __('Add Outfit') }}</button>
                        <textarea type="text" name="content" placeholder="What's new?" class="w-full resize-none"></textarea>
                        
                        <button type="submit" class="border rounded shadow-sm bg-white w-full px-16 py-4 font-semibold my-2 ">{{ __('Send') }}</button>
                        <div x-show="open" class="mb-16">
                            <livewire:outfits.select-outfit />
                        </div>
                    </div>

                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
        
                </form>
            </div>
        </div>
    </div>
</x-app-layout>