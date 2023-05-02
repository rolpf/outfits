<?php

namespace Database\Seeders;

use App\Models\Outfit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 60; $i++) {
            $user = \App\Models\User::inRandomOrder()->first();
            $data = [
                'content' => fake()->text(100),
                'user_id' => $user->id,
                'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
            ];

            //rand if we want to add outfit_id
            if (rand(0, 1)) {
                $data['outfit_id'] = Outfit::inRandomOrder()->first()->id;
            }

            \DB::table('posts')->insert($data);
        }
    }
}
