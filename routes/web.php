<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FarmasiController;

Route::get('/', [FarmasiController::class, 'indexObat']);

Route::get('/data-obat', [FarmasiController::class, 'indexObat']);
Route::post('/tambah-obat', [FarmasiController::class, 'storeObat']);
Route::get('/edit-obat/{id}', [FarmasiController::class, 'editObat']);
Route::post('/update-obat/{id}', [FarmasiController::class, 'updateObat']);
Route::get('/hapus-obat/{id}', [FarmasiController::class, 'destroyObat']);

Route::get('/kategori-obat', [FarmasiController::class, 'indexKategori']);
Route::post('/tambah-kategori', [FarmasiController::class, 'storeKategori']);
Route::get('/edit-kategori/{id}', [FarmasiController::class, 'editKategori']);
Route::post('/update-kategori/{id}', [FarmasiController::class, 'updateKategori']);
Route::get('/hapus-kategori/{id}', [FarmasiController::class, 'destroyKategori']);