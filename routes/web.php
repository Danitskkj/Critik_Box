<?php

use App\Http\Controllers\FilmeController;
use App\Http\Controllers\GeneroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::resource('filmes', FilmeController::class);
Route::resource('generos', GeneroController::class);

Route::post('filmes/{filme}/avaliar', [FilmeController::class, 'avaliar'])->name('filmes.avaliar');