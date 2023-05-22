<div x-data class="w-full lg:mr-24">
    <div class="w-full relative">
        <input type="search" wire:model="filterCategory" placeholder="{{ __('Select a category') }}" class="my-2 w-full">
        <div wire:loading wire:target="loadMore" class="absolute top-1/2 right-0 -translate-x-full -translate-y-1/2">
            <x-loading class="w-4 aspect-square border-2 border-t-2"/>
        </div>
    </div>
    <div class="h-32 lg:h-64 w-full flex flex-col overflow-y-auto bg-white border rounded shadow-sm">
        @foreach($categories as $category)
            <label wire:click="$set('selectedCategory', {{ $category->id }})" @class(["bg-primary/60 text-white font-semibold" => $selectedCategory === $category->id])>
                <input class="hidden" type="radio" value="{{ $category->id }}" @checked($selectedCategory === $category->id) name="category"/>
                <p class="py-2">{{ $category->name }}</p>
            </label>
        @endforeach
        <span x-intersect:enter="$wire.loadMore"></span>
    </div>
</div>