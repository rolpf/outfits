<div class="w-full">
    <div class="h-8 w-full flex gap-2 items-center">
        <p>{{ __('Select a brand') }} <x-loading wire:loading wire:target="loadMore" class="w-4 aspect-square border-2 border-t-2"/></p>
    </div>
    <input type="search" wire:model="filterBrand">
    <div class="h-32 w-full flex flex-col overflow-y-auto">
        @foreach($brands as $brand)
            <label wire:click="$set('selectedBrand', {{ $brand->id }})" @class(["bg-gray-300" => $selectedBrand === $brand->id])>
                <input class="hidden" value="{{ $brand->id }}" type="radio" @checked($selectedBrand === $brand->id) :checked="selectedBrand === {{ $brand->id  }}" name="brand"/>
                {{ $brand->name }}
            </label>
        @endforeach
        <span x-intersect:enter="$wire.loadMore"></span>
    </div>

</div>
