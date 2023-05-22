<?php

namespace App\Http\Controllers;

use App\Notifications\FollowNotification;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Outfit;

class BioController extends Controller
{
    public function index($id)
    {

        $user = auth()->user();
        $profile = User::find($id);
        $profile = User::with('followers')->findOrFail($id);
        $profile = User::with('following')->findOrFail($id);
        $posts = $profile->posts()->orderByDesc('created_at')->get();
        $outfits = $profile->outfits()->orderByDesc('created_at')->get();

        return view('bio', compact('user', 'profile', 'posts', 'outfits'));
    }

    public function follow($id)
    {
        $user = auth()->user();
        $profile = User::findOrFail($id);

        $user->following()->toggle($profile);

        if($user->following->contains($profile)) {
            $profile->notify(new FollowNotification($user));
        }

        return redirect()->back();
    }
}
