<div class="w-full">
    <input type="search" wire:model="search" class="w-full my-4" placeholder="Search a cloth">
    <div class="w-full lg:grid-cols-3 grid-cols-2 grid gap-8 py-4">
        @foreach ($clothes as $cloth)
            <div x-data="{checked: @js(in_array($cloth->id, $existingClothes)) }" class="w-full">
                <label for="{{ sprintf('cloth%s', $cloth->id) }}" :class="{'bg-primary text-white': checked, 'bg-white': !checked}" class="flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg border border-blue cursor-pointer hover:bg-primary hover:text-white">
                    <img src="{{ $cloth->thumbnail }}" class="w-32 h-32 rounded-full border-2 shadow-sm">
                    <p class="mt-2 text-base leading-normal line-clamp-2 text-center">{{ $cloth->name }}</p>
                    <input @change="checked = $el.checked " id="{{ sprintf('cloth%s', $cloth->id) }}" type="checkbox" name="clothes[]"
                           value="{{ $cloth->id }}" class="hidden">
                </label>
            </div>
        @endforeach
    </div>
</div>