<div class="w-full">
    <div class="h-8 w-full flex gap-2 items-center">
        <p>{{ __('Select a category') }} <x-loading wire:loading wire:target="loadMore" class="w-4 aspect-square border-2 border-t-2"/></p>
    </div>
    <input type="search" wire:model="filterCategory">
    <div class="h-32 w-full flex flex-col overflow-y-auto">
        @foreach($categories as $category)
            <label wire:click="$set('selectedCategory', {{ $category->id }})" @class(["bg-gray-300" => $selectedCategory === $category->id])>
                <input class="hidden" type="radio" value="{{ $category->id }}" @checked($selectedCategory === $category->id) name="category"/>
                {{ $category->name }}
            </label>
        @endforeach
        <span x-intersect:enter="$wire.loadMore"></span>
    </div>

</div>
