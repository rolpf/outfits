<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\User::all();
        $users->each(function ($user) use ($users) {
            $user->followers()->attach(
                $users->random(rand(1, 5))->pluck('id')->toArray()
            );
        });
    }
}
