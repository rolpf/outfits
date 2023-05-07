<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function index()
    {
        // $user = Auth::user();
        $followers = $user->followers;

        $posts = Post::whereIn('author_id', $followers->pluck('id')->push($user->id))
                    ->with('author')
                    ->orderByDesc('created_at')
                    // ->paginate(10);

        return view('timeline', compact('posts'));
    }
}
