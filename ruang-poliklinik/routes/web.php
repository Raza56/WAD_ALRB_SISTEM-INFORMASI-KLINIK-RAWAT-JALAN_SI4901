<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoliklinikController;
use App\Http\Controllers\AuthController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');

    Route::post('/login', [AuthController::class, 'authenticate']);
    Route::post('/register', [AuthController::class, 'store']);
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/', [PoliklinikController::class, 'index']);
    Route::get('/poliklinik', [PoliklinikController::class, 'index']);

    Route::post('/poliklinik/store', [PoliklinikController::class, 'store']);

    Route::get('/poliklinik/edit/{id}', [PoliklinikController::class, 'edit']);

    Route::put('/poliklinik/update/{id}', [PoliklinikController::class, 'update']);

    Route::delete('/poliklinik/delete/{id}', [PoliklinikController::class, 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});