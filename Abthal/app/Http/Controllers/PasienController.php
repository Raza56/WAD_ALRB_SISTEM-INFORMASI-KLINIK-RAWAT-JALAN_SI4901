<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index(Request $request)
    {
        $pasiens = Pasien::orderBy('no_rm', 'ASC')->get();

        $editData = null;
        if ($request->has('edit')) {
            $editData = Pasien::find($request->edit);
        }

        return view('pasien.index', compact('pasiens', 'editData'));
    }

    public function store(Request $request)
    {
        if ($request->filled('id_pasien')) {
            $pasien = Pasien::find($request->id_pasien);
            $pasien->update($request->all());
            $pesan = "Data pasien <b>{$request->nama}</b> berhasil diperbarui.";
        } else {
            Pasien::create($request->all());
            $pesan = "Data pasien baru <b>{$request->nama}</b> berhasil disimpan.";
        }

        return redirect()->route('pasien.index')->with('sukses', $pesan);
    }

    public function destroy($id)
    {
        Pasien::destroy($id);
        return redirect()->route('pasien.index')->with('sukses', 'Data pasien berhasil dihapus dari sistem.');
    }
}
