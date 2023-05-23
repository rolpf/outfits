<div>
    <input type="search" wire:model="searchTerm" placeholder="Search users" class="w-full"/>
    <div wire:loading wire:target="loadMore" class="absolute top-1/2 right-0 -translate-x-full -translate-y-1/2">
        <x-loading class="w-4 aspect-square border-2 border-t-2"/>
    </div>

    <ul class="bg-white">

        @if (!isset($searchTerm))
            @foreach ($users as $user)
                <li class="py-2 hover:bg-primary/60 w-full hover:text-white hover:font-semibold my-2 px-4 lg:px-8">
                    <a href="{{ route('bio', $user->id) }}" class="w-full flex items-center" >
                        <img src="{{ $user->profile_photo_url }}" alt="" class="w-12 h-12 rounded-full mr-2">
                        <p class="px-4">{{ $user->name }}</p>
                    </a></li>
            @endforeach
        @endif
    </ul>

    {{-- <button wire:click="search" class="border rounded shadow-sm bg-white w-full px-16 py-4 font-semibold my-2">Search</button> --}}
</div>