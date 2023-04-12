<?php

namespace Database\Seeders;

use Arr;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lines = file(__DIR__.'/catalogs.xml');
        $urlXml = simplexml_load_string($lines[0]);
        $urlJson = json_encode($urlXml);
        $urls = json_decode($urlJson);
        $urls = collect($urls->url);

        $categories = $urls->filter(function ($array) {
            $loc = $array->loc;
            $category = (str_contains($loc, 'hommes') || str_contains($loc, 'femmes')) && (str_contains($loc, 'vetements') || str_contains($loc, 'accessoires'));
            return $category;
        })->map(function ($line) {
            return Arr::last(explode('/', $line->loc));
        });

        $categories = $categories->filter(function ($category){
            return $category !== "vetements" && !str_contains($category, 'autre') && !str_contains($category, 'accessoires');
        })->map(function($slug) {
            $slug = preg_replace("/-(\d+)$/", ' ', $slug);
            $name = Str::title($slug);
            $name = Str::replace('-',' ', $name);
            return [
                'slug' => $slug,
                'name' => $name
            ];
        });

        $categories = $categories->unique('slug');

        DB::table('categories')->insert($categories->all());
    }
}
