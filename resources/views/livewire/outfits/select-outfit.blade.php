
<div class="w-full">
    

        <input wire:model="search" type="text" placeholder="Enter your outfit name" class="w-full border rounded shadow-sm px-8 py-2 my-2">
        <div class=" grid grid-cols-2">
        @foreach ($outfits as $outfit)
            <div wire:click="$set('selectedOutfit', {{ $outfit->id }})" @class([
                "h-8 w-8 bg-red-200",
                "bg-green-200" => $selectedOutfit == $outfit->id
            ])>
                {{ $outfit->id }}
                
            </div>
        @endforeach

        @if ($selectedOutfit)
            <input type="hidden" name="outfit_id" value="{{ $selectedOutfit }}">
        @endif
    </div>
    {{ $outfits->links() }}
</div>