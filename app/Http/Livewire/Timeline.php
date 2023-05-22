<?php

namespace App\Http\Livewire;
use App\Models\Post;
use Livewire\WithPagination;

use Livewire\Component;
use App\Models\User;

class Timeline extends Component
{
    use WithPagination;
    public $perPage = 6;
    public $postPool = 'timeline';
    public $user = null;

    public function loadMore()
    {
        $this->perPage += 10;
    }
 
    public function render()
    {
        switch ($this->postPool) {
            case 'timeline':
                $posts = auth()->user()->timeline();
                break;
            case 'profile':
                $posts = User::findOrFail($this->user)->posts()->orderByDesc('created_at');
                break;
            default:
                throw new \Exception("Invalid post pool");
                break;
        }
 
        return view('livewire.timeline', [
            'posts' => $posts->paginate($this->perPage),
        ]);
    }
}