<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OutfitClothSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $outfits = \App\Models\Outfit::all();
        $clothes = \App\Models\Cloth::all();

        foreach ($outfits as $outfit) {
            $availableClothes = $clothes->where('user_id', '=', $outfit->user_id);
            $outfit->clothes()->attach($availableClothes->random(rand(1, $availableClothes->count())));
        }
    }
}
