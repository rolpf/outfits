export default function Select2(items) {
    return {
        items: items,
        selectedItem: null,
        filterValue: '',
        showDropdown: false,
        init() {
            console.dir(items);
        },
        handleSelect(item) {
            this.selectedItem = item;
        },
        filteredItems() {
            return items. (function (item, index, items) {
                if(this.filterValue === '') {
                    return items
                }
                return item.name.toLowerCase().includes(this.filterValue);
            }, this)
        },
        handleKeyUp(query) {
            this.filterValue = query
        }
    }
}
