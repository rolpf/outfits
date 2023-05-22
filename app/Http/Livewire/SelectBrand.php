<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Livewire\Component;

class SelectBrand extends Component
{
    public $filterBrand = null;
    public $brandsToShow = 6;
    public $selectedBrand = null;
    public function mount($selectedBrand = null) {
        $this->selectedBrand = $selectedBrand;
    }
    public function render()
    {
        $brands = Brand::query();
        if ($this->filterBrand) {
            $brands->where('name', 'like', '%' . $this->filterBrand . '%');
        }

        return view('livewire.select-brand', [
            'brands' => $brands->paginate($this->brandsToShow)
        ]);
    }

    public function loadMore() {
        $this->brandsToShow += 6;
    }
}
