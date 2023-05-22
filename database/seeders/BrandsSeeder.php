<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Récupération des marques depuis le fichier brands.txt
        // Après filtrage de certaines données non souhaitées du fichier

        $brands = collect(file(__DIR__.'/brands.txt'));

        $alphabet = range('A', 'Z');
        $brands = $brands->map(function ($line) {
            return ucfirst(str_replace("\n","",$line));
        });
        $brands = $brands->filter(function ($line) use($alphabet) {
            return !in_array($line, $alphabet);
        })->values();

        $brands = $brands->filter(function ($line, $index) {
            // check if has only nummbers
            return !is_numeric($line);
        })->values();

        $brands = $brands->map(function ($line) {
            return ['name' => $line];
        });

        DB::table('brands')->insert($brands->all());
    }
}
