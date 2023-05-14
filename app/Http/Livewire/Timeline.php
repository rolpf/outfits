<?php

namespace App\Http\Livewire;
use App\Models\Post;
use Livewire\WithPagination;

use Livewire\Component;

class Timeline extends Component
{
    use WithPagination;
    public $perPage = 10;


    public function loadMore()
    {
        $this->perPage += 10;
    }
 
    public function render()
    {
        $posts = auth()->user()->timeline();
 
        return view('livewire.timeline', [
            // 'posts' => $posts->paginate(10)
            'posts' => Post::latest()->paginate($this->perPage),
        ]);
    }
}