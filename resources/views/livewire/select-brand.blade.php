<div x-data class="w-full lg:mr-24">
    <div class="w-full relative">
        <input type="search" wire:model="filterBrand" placeholder="{{ __('Select a brand') }}" class="my-2 w-full">
        <div wire:loading wire:target="loadMore" class="absolute top-1/2 right-0 -translate-x-full -translate-y-1/2">
            <x-loading class="w-4 aspect-square border-2 border-t-2"/>
        </div>
    </div>
    <div class="h-32 lg:h-64 w-full flex flex-col overflow-y-auto bg-white border rounded shadow-sm">
        @foreach($brands as $brand)
            <label wire:click="$set('selectedBrand', {{ $brand->id }})" @class(["bg-primary/60 text-white font-semibold" => $selectedBrand === $brand->id])>
                <input class="hidden" value="{{ $brand->id }}" type="radio" @checked($selectedBrand === $brand->id) name="brand"/>
                <p class="py-2 ">{{ $brand->name }}</p>
            </label>
        @endforeach
        <span x-intersect:enter="$wire.loadMore"></span>
    </div>
</div>