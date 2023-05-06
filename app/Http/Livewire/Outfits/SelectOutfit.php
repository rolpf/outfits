<?php

namespace App\Http\Livewire\Outfits;
use Livewire\WithPagination;

use Livewire\Component;

class SelectOutfit extends Component
{
    use WithPagination;
    public $search;
    public $selectedOutfit;

    public function render()
    {

        $outfits = auth()->user()->outfits();
        if ($this->search) {
            $outfits->where('name', 'like', '%' . $this->search . '%');
        }
        return view('livewire.outfits.select-outfit', [
            'outfits' => $outfits->paginate(6)
        ]);
    }
}