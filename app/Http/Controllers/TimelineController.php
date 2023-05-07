<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Outfit;

class TimelineController extends Controller
{
    public function index()
    {
        $user = auth()->user()->load('followers'); 
        $followers = $user->followers;

        $posts = Post::whereIn('user_id', $followers->pluck('id')->push($user->id))
                    ->with('user')
                    ->orderByDesc('created_at')
                    ->get();

        return view('timeline', compact('posts', 'user', 'followers'));
    }
}
