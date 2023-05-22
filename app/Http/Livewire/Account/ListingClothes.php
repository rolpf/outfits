<?php

namespace App\Http\Livewire\Account;

use App\Models\Cloth;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;
use Livewire\WithPagination;

class ListingClothes extends Component
{
    use WithPagination, InteractsWithBanner;

    public string $search = '';

    public function render()
    {
        $clothes = auth()->user()->clothes();
        if ($this->search) {
            $clothes->where('name', 'like', '%' . $this->search . '%');
        }
        return view('livewire.account.listing-clothes', [
            'clothes' => $clothes->orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    public function deleteCloth(Cloth $cloth)
    {
        $isAuthorized = \Gate::inspect('delete', $cloth);

        if ($isAuthorized->denied()) {
            $this->dangerBanner(__("You do not own this cloth."));
            return;
        }

        if ($cloth->thumbnail) {
            \Storage::disk('public')->delete($cloth->thumbnail);
        }

        $cloth->delete();

        session()->flash('success', __('Cloth deleted successfully.'));
    }
}
