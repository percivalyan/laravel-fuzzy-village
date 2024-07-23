<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\LahanController;
use App\Http\Controllers\FotoController;

Route::get('/', function () {
    return view('layouts/app');
});

Route::resource('harga', HargaController::class);
Route::resource('lahan', LahanController::class);
Route::resource('foto', FotoController::class);