<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\LahanController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\KesuburanController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    } else {
        return view('user/login', ['title' => 'Login']);
    }
})->name('user/login');

// Define the route for the dashboard
Route::get('/dashboard', function () {
    return view('dashboard');  // This should match the view file name in resources/views
})->name('dashboard');

Route::resource('harga', HargaController::class);
Route::resource('lahan', LahanController::class);
Route::resource('foto', FotoController::class);
Route::resource('kesuburan', KesuburanController::class);
Route::resource('periode', PeriodeController::class);

Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
