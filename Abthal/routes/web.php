<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasienController; 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('pasien.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');
    Route::post('/pasien', [PasienController::class, 'store'])->name('pasien.store');
    Route::delete('/pasien/{id}', [PasienController::class, 'destroy'])->name('pasien.destroy');
});

require __DIR__.'/auth.php';