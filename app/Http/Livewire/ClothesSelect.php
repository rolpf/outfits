<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ClothesSelect extends Component
{
    public $search;
    public $clothesToDisplay = 10;
    private $existingClothes;

    public function mount($existingClothes = [])
    {
        if($existingClothes instanceof \Illuminate\Database\Eloquent\Collection) {
            $existingClothes = $existingClothes->pluck('id')->toArray();
        }
        $this->existingClothes = $existingClothes;
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $clothes = auth()->user()->clothes();

        if ($this->search) {
            $clothes = $clothes->where('name', 'like', '%' . $this->search . '%');
        }

        return view('livewire.clothes-select', [
            'clothes' => $clothes->paginate($this->clothesToDisplay),
            'existingClothes' => $this->existingClothes
        ]);
    }
}
