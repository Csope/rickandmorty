<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EpisodeController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [EpisodeController::class, 'index'])->name('episodes');
Route::post('/filter-episodes', [EpisodeController::class, 'filter']);
Route::get('/sort-episodes/{name}', [EpisodeController::class, 'sort']);