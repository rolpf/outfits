<div x-data="Select2(@js($items))" class="w-full h-12 relative">
    <input type="hidden" :value="selectedItem" value="">
    <div @click="showDropdown = !showDropdown" class="flex items-center justify-center w-full h-full bg-neutral-100 grid grid-cols-5">
        <div class="relative overflow-hidden col-span-4 h-full">
            <p class="absolute top-1/2 -translate-y-1/2 left-4 w-48" x-show="!selectedItem">Selectionner</p>
            <p class="absolute top-1/2 -translate-y-1/2 left-4 w-48" x-show="selectedItem" x-text="selectedItem?.name"></p>
        </div>
        <div class="flex items-center justify-center">
            <span>v</span>
        </div>
    </div>
    <div :class="{'hidden': !showDropdown}" class="w-full hidden absolute bottom-0 left-0 translate-y-full h-48 bg-white flex flex-col">
        <div class="w-full h-12">
            <input @keyup="handleKeyUp($el.value)" type="text" class="w-full">
        </div>
        <div class="block overflow-y-scroll scrollbar-thin scrollbar-thumb-neutral-500">
            <template x-for="item in filteredItems()">
                <div @click="handleSelect(item)"
                     class="w-full h-12 flex items-center justify-center border-b cursor-pointer hover:bg-neutral-100">
                    <p class="text-center text-sm" x-text="item.name"></p>
                </div>
            </template>
        </div>

    </div>
</div>
