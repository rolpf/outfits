<?php

namespace App\Http\Livewire\Account;

use App\Models\Outfit;
use Livewire\Component;
use Livewire\WithPagination;

class ListingOutfits extends Component
{
    use WithPagination;
    public $search = '';

    public function render()
    {
        $outfits = auth()->user()->outfits();

        if ($this->search) {
            $outfits->where('name', 'like', '%' . $this->search . '%');
        }

        return view('livewire.account.listing-outfits', [
            'outfits' => $outfits->orderBy('created_at', 'desc')->paginate(10),
        ]);
    }
}
