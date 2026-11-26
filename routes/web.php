<?php

<<<<<<< HEAD
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
=======
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
>>>>>>> origin/andhika
