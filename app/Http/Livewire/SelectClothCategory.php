<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class SelectClothCategory extends Component
{
    public $filterCategory = null;
    public $categoriesToShow = 12;
    public $selectedCategory = null;
    public function mount($selectedCategory = null) {
        $this->selectedCategory = $selectedCategory;
    }
    public function render()
    {
        $categories = Category::query();

        if ($this->filterCategory) {
            $categories->where('name', 'like', '%' . $this->filterCategory . '%');
        }

        return view('livewire.select-cloth-category', [
            'categories' => $categories->paginate($this->categoriesToShow)
        ]);
    }

    public function loadMore() {
        $this->categoriesToShow += 6;
    }
}
