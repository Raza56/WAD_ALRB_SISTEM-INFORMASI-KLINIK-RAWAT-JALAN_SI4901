<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Route::middleware(['cek.poliklinik'])->group(function () {
    Route::get('/', function () {
        return view('index');
    });

    Route::post('/simpan-ruangan', function (Request $request) {
        DB::table('ruangan')->insert([
            'Nomor' => $request->Nomor,
            'Nama_Ruangan' => $request->Nama_Ruangan,
            'Jenis_Poli' => $request->Jenis_Poli,
            'Lokasi_Gedung' => $request->Lokasi_Gedung,
        ]);
        return redirect('/')->with('success', 'Data ruangan berhasil disimpan!');
    });

    Route::post('/simpan-alat', function (Request $request) {
        DB::table('alat_medis')->insert([
            'nomor' => $request->nomor,
            'nama_alat' => $request->nama_alat,
            'jumlah' => $request->jumlah,
            'kondisi' => $request->kondisi,
        ]);
        return redirect('/')->with('success', 'Data alat medis berhasil disimpan!');
    });

    Route::get('/read', function () {
        $ruangan = DB::table('ruangan')->get();
        $alat_medis = DB::table('alat_medis')->get();
        return view('read', compact('ruangan', 'alat_medis'));
    });

    //delete ruangan
    Route::delete('/hapus-ruangan/{nomor}', function ($nomor) {
        DB::table('ruangan')->where('Nomor', $nomor)->delete();
        return redirect('/read')->with('success', 'Data ruangan berhasil dihapus!');
    });

    //delete alatmedis
    Route::delete('/hapus-alat/{nomor}', function ($nomor) {
        DB::table('alat_medis')->where('nomor', $nomor)->delete();
        return redirect('/read')->with('success', 'Data alat medis berhasil dihapus!');
    });
});