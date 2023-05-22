<?php

namespace App\Http\Livewire;

use Livewire\Component;
use app\Models\User;

class UserSearch extends Component
{
    public $searchTerm = '';

    public function render()
    {

        $users = User::where('name', 'like', '%' . $this->searchTerm . '%')->get();

        return view('livewire.user-search', [
            'users' => $users,
        ]);
    }
}