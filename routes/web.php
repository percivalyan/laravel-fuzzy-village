<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\LahanController;

Route::get('/', function () {
    return view('layouts/app');
});

// Rute untuk menampilkan daftar harga
Route::get('/harga', [HargaController::class, 'index'])->name('harga.index');

// Rute untuk menampilkan form untuk membuat harga baru
Route::get('/harga/create', [HargaController::class, 'create'])->name('harga.create');

// Rute untuk menyimpan data harga baru
Route::post('/harga', [HargaController::class, 'store'])->name('harga.store');

// Rute untuk menampilkan form untuk mengedit harga
Route::get('/harga/{id}/edit', [HargaController::class, 'edit'])->name('harga.edit');

// Rute untuk memperbarui data harga
Route::put('/harga/{id}', [HargaController::class, 'update'])->name('harga.update');

// Rute untuk menampilkan detail harga
Route::get('/harga/{id}', [HargaController::class, 'show'])->name('harga.show');

// Rute untuk menghapus harga (jika diperlukan)
Route::delete('/harga/{id}', [HargaController::class, 'destroy'])->name('harga.destroy');

Route::resource('lahan', LahanController::class);