<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\User::all();
        $posts = \App\Models\Post::all();

        foreach ($posts as $post) {
            $post->likes()->attach($users->random(rand(0, $users->count())));
        }
    }
}
