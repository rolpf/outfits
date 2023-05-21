<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class BioController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);
        $user = User::with('followers')->findOrFail($id);
        $user = User::with('following')->findOrFail($id);
        $posts = $user->posts()->orderByDesc('created_at')->get();

        return view('bio', compact('user', 'posts'));
    }
}
