<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClothCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clothes = \App\Models\Cloth::all();
        $categories = \App\Models\Category::all();

        foreach ($clothes as $cloth) {
            $cloth->categories()->associate( $categories->random(rand(1, 3)) );
        }
    }
}
