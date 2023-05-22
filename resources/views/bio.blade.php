<x-app-layout>
    <x-container>
        <div class="py-8">
            <div class="flex items-center max-w-7xl mx-auto sm:px-6 lg:px-8 lg:mx-56">
                <img src="{{ $profile->profile_photo_url }}" alt="{{ $profile->name }}" class="w-12 h-12 rounded-full">
                <h1 class="my-8 text-3xl font-semibold">{{ $profile->name }}</h1>
            </div>
            <div class="flex justify-center">
                <div class="p-6 mx-2 border border-shadow bg-white">
                    <p class="text-center font-semibold">{{ $posts->count() }} {{ __('posts') }}</p>
                </div>
                <div class="p-6 mx-2 border border-shadow bg-white">
                    <p class="text-center font-semibold">{{ $profile->followers->count() }} {{ __('followers') }}</p>
                </div>
                <div class="p-6 mx-2 border border-shadow bg-white">
                    <p class="text-center font-semibold">{{ $profile->following->count() }} {{ __('following') }}</p>
                </div>
            </div>


            @if ($user->id != $profile->id)
                <form action="{{ route('follow', ['id' => $profile->id]) }}" method="POST">
                    @csrf
                    <button class="border rounded shadow-sm bg-white w-full px-16 py-4 font-semibold my-2" type="submit">{{ $user->following->contains($profile) ? __('Unfollow ') : __('Follow ') }}</button>
                </form>
            @else
            <form action="{{ route('profile.show') }}" method="POST">
                @csrf
                <button class="border rounded shadow-sm bg-white w-full px-16 py-4 font-semibold my-2" type="submit">{{ __('Edit profile ') }}</button>
            </form>
            @endif


            <span class="my-2 text-xl font-semibold">{{ __('Posts') }}</span>
            <div class="">
                @livewire ('timeline', ['postPool' => 'profile', 'user' => $profile->id])
            </div>
            <span class="my-2 text-xl font-semibold">{{ __('Outfits') }}</span>
            <div class="">
                {{-- @foreach($outfits as $outfit)

                @endforeach --}}
            </div>
        </div>
    </x-container>
</x-app-layout>
