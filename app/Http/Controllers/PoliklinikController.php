<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poliklinik;

class PoliklinikController extends Controller
{
    public function index()
    {
        return view('poliklinik', [
            'data_ruangan' => Poliklinik::all(),
            'ruangan_edit' => null
        ]);
    }

    public function edit($id)
    {
        $ruangan_edit = Poliklinik::findOrFail($id);

        return view('poliklinik', [
            'data_ruangan' => Poliklinik::all(),
            'ruangan_edit' => $ruangan_edit
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_poli' => 'required',
            'lokasi_gedung' => 'required',
            'nomor_ruangan' => 'required',
            'inventaris' => 'nullable'
        ]);

        Poliklinik::create([
            'nama_poli' => $request->nama_poli,
            'lokasi_gedung' => $request->lokasi_gedung,
            'nomor_ruangan' => $request->nomor_ruangan,
            'inventaris' => $request->inventaris
        ]);

        return redirect('/poliklinik')->with('pesan', 'Data berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_poli' => 'required',
            'lokasi_gedung' => 'required',
            'nomor_ruangan' => 'required',
            'inventaris' => 'nullable'
        ]);

        $ruangan = Poliklinik::findOrFail($id);

        $ruangan->update([
            'nama_poli' => $request->nama_poli,
            'lokasi_gedung' => $request->lokasi_gedung,
            'nomor_ruangan' => $request->nomor_ruangan,
            'inventaris' => $request->inventaris
        ]);

        return redirect('/poliklinik')->with('pesan', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $ruangan = Poliklinik::findOrFail($id);

        $ruangan->delete();

        return redirect('/poliklinik')->with('pesan', 'Data berhasil dihapus!');
    }
}
