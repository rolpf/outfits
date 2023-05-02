<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OutfitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 40; $i++) {
            $user = \App\Models\User::inRandomOrder()->first();
            \DB::table('outfits')->insert([
                'user_id' => $user->id,
                'name' => fake()->text(100),
                'slug' => fake()->text(100),
                'thumbnail' => fake()->imageUrl(640, 480, 'fashion', true, 'Outfit'),
                'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
            ]);
        }
    }
}
