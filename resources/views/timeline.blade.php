<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Timeline') }}
        </h2>
    </x-slot>
    <div class="py-12">


        {{-- @foreach($posts as $post)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-4">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->content }}</p>
                @isset($post->outfit_id)
                    <p>Outfit: {{ $post->outfit_id }}</p>
                @endisset
                <small>Posted by {{ $post->user->name }}</small>
            </div>
        </div>
    @endforeach --}}

    <livewire:timeline />


</x-app-layout>