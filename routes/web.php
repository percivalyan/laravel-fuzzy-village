<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\LahanController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\KesuburanController;

Route::get('/', function () {
    return view('layouts/app');
});

Route::resource('harga', HargaController::class);
Route::resource('lahan', LahanController::class);
Route::resource('foto', FotoController::class);
Route::resource('kesuburan', KesuburanController::class);