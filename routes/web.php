<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $brands = collect(file('brands.txt'));

    $alphabet = range('A', 'Z');
    $brands = $brands->map(function ($line) {
        return ucfirst(str_replace("\n","",$line));
    });
    $brands = $brands->filter(function ($line) use($alphabet) {
        return !in_array($line, $alphabet);
    })->values();

    $brands = $brands->filter(function ($line, $index) {
        return $index % 2 === 0;
    })->values();

    $brands = $brands->map(function ($line) {
        return ['name' => $line];
    });


    dd($brands->all());
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
