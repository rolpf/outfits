
<div class="w-full">
    
        <input wire:model="search" type="text" placeholder="{{ __('Search for an outfit') }}" class="w-full border rounded shadow-sm px-8 py-2 my-2">
        {{ $outfits->links() }}
        <div class=" grid grid-cols-2 justify-center">
        @foreach ($outfits as $outfit)
            <div wire:click="$set('selectedOutfit', {{ $outfit->id }})" @class([
                "bg-white flex justify-center items-center",
                "bg-slate-200" => $selectedOutfit == $outfit->id
            ])>
                <img class="m-2 h-32 w-32 border rounded shadow-sm" src="{{ $outfit->thumbnail }}">
                
            </div>
        @endforeach

        @if ($selectedOutfit)
            <input type="hidden" name="outfit_id" value="{{ $selectedOutfit }}">
        @endif
    </div>
</div>