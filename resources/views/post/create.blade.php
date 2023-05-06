<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                <form method="POST" action="{{ route('post.store') }}">
                    @csrf
                    <h1 class="font-bold text-xl my-4">{{ __("Send a post") }}</h1>
                    <textarea type="text" name="content" placeholder="What's new?" class="w-full resize-none"></textarea>

                    <button class="block border rounded shadow-sm bg-white px-8 py-2 font-semibold"> Add Outfit </button>
                    
                    <div class="w-full">
                        <livewire:outfits.select-outfit />
                    </div>

                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="absolute block border rounded shadow-sm bg-white w-full px-16 py-4 font-semibold bottom-0">Send</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>