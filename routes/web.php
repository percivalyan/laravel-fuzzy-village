<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\LahanController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\KesuburanController;
use App\Http\Controllers\PeriodeController;

Route::get('/', function () {
    return view('layouts/dashboard');
});

Route::resource('harga', HargaController::class);
Route::resource('lahan', LahanController::class);
Route::resource('foto', FotoController::class);
Route::resource('kesuburan', KesuburanController::class);
Route::resource('periode', PeriodeController::class);