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
    return view('timeline');
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::prefix('account')->name('account.')->group(function () {
        Route::get('/', function () {
            return view('dashboard');
        })->name('index');

        Route::resource('clothes', \App\Http\Controllers\Account\ClothController::class)->except(['show']);
        Route::resource('outfits', \App\Http\Controllers\Account\OutfitController::class)->except(['show']);
    });

    Route::resource('post', \App\Http\Controllers\PostController::class)->except(['show', 'index', 'edit', 'update']);
    Route::get('bio/{id}', [\App\Http\Controllers\BioController::class, 'index'])->name('bio');
    Route::post('/follow/{id}', [\App\Http\Controllers\BioController::class, 'follow'])->name('follow');
    Route::post('/unfollow/{id}', [\App\Http\Controllers\BioController::class, 'unfollow'])->name('unfollow');
});
