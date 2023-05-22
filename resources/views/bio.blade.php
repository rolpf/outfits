<x-app-layout>
    <x-container>
        <div class="py-8">
            <div class="flex items-center max-w-7xl mx-auto sm:px-6 lg:px-8 lg:mx-60">
                <img src="{{ $profile->profile_photo_url }}" alt="{{ $profile->name }}" class="w-12 h-12 ml-4 rounded-full">
                <h1 class="my-8 ml-8 text-3xl font-semibold">{{ $profile->name }}</h1>

                @if ($user->id != $profile->id)
                @if ($user->following->contains($profile))
                    <form action="{{ route('unfollow', ['id' => $profile->id]) }}" method="POST">
                        @csrf
                        <button class="border outline-primary text-primary mx-4 rounded shadow-sm bg-white px-16 py-4 font-semibold my-2" type="submit">{{ __('Unfollow') }}</button>
                    </form>
                @else
                    <form action="{{ route('follow', ['id' => $profile->id]) }}" method="POST">
                        @csrf
                        <button class="border bg-primary text-white mx-4 rounded shadow-sm bg-white px-16 py-4 font-semibold my-2" type="submit">{{ __('Follow ') }}</button>
                    </form>
                @endif
            @else
            <form action="{{ route('profile.show') }}" method="POST">
                @csrf
                <button class="border bg-primary text-white mx-4 p-6 rounded shadow-sm bg-white py-4 font-semibold my-2" type="submit">{{ __('Edit profile ') }}</button>
            </form>
            @endif

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


            


            {{-- <span class="my-2 text-xl font-semibold">{{ __('Posts') }}</span> --}}
            <div class="">
                @livewire ('timeline', ['postPool' => 'profile', 'user' => $profile->id])
            </div>
            {{-- <span class="my-2 text-xl font-semibold">{{ __('Outfits') }}</span> --}}
            <div class="">
                {{-- @foreach($outfits as $outfit)
    
                @endforeach --}}
            </div>
        </div>
    </x-container>
</x-app-layout>