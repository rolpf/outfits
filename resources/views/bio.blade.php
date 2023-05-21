<x-app-layout>
    <div class="py-8">
        <div class="flex items-center max-w-7xl mx-auto sm:px-6 lg:px-8 lg:mx-56">
            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="w-12 h-12 rounded-full">
            <h1 class="my-8 text-3xl font-semibold">{{ $user->name }}</h1>
        </div>
        <div class="flex justify-center">
            <div class="p-6 mx-2 border border-shadow">
                <p>{{ $posts->count() }} {{ __('posts') }}</p>
            </div>
            <div class="p-6 mx-2 border border-shadow">
                <p>{{ $user->followers->count() }} {{ __('followers') }}</p>
            </div>
            <div class="p-6 mx-2 border border-shadow">
                <p>{{ $user->following->count() }} {{ __('following') }}</p>
            </div>
        </div>
        <h2 class="my-2 text-xl font-semibold">Posts</h2>
        <div class="">
            @foreach($posts as $post)
                @include('components.post')
            @endforeach
        </div>

    </div>
</x-app-layout>