<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClothBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = \App\Models\Brand::all();
        $clothes = \App\Models\Cloth::all();

        foreach ($clothes as $cloth) {
            $cloth->brand()->attach($brands->random(1));
        }
    }
}
