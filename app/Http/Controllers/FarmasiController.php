<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FarmasiController extends Controller
{
    public function indexObat()
    {
        $data = DB::table('obat')->get();
        return view('data-obat', compact('data'));
    }

    public function storeObat(Request $request)
    {
        DB::table('obat')->insert([
            'kode_obat'  => $request->kode_obat,
            'nama_obat'  => $request->nama_obat,
            'kategori'   => $request->kategori,
            'sediaan'    => $request->sediaan,
            'pabrikan'   => $request->pabrikan,
        ]);

        return redirect('/data-obat');
    }

    public function editObat($id)
    {
        $obat = DB::table('obat')->where('id', $id)->first();
        return view('edit-obat', compact('obat'));
    }

    public function updateObat(Request $request, $id)
    {
        DB::table('obat')->where('id', $id)->update([
            'kode_obat'  => $request->kode_obat,
            'nama_obat'  => $request->nama_obat,
            'kategori'   => $request->kategori,
            'sediaan'    => $request->sediaan,
            'pabrikan'   => $request->pabrikan,
        ]);

        return redirect('/data-obat');
    }

    public function destroyObat($id)
    {
        DB::table('obat')->where('id', $id)->delete();
        return redirect('/data-obat');
    }

    public function indexKategori()
    {
        $kategori = DB::table('kategori')->get();
        return view('kategori-obat', compact('kategori'));
    }

    public function storeKategori(Request $request)
    {
        DB::table('kategori')->insert([
            'nama_kategori' => $request->nama_kategori,
            'keterangan'    => $request->keterangan,
        ]);

        return redirect('/kategori-obat');
    }

    public function editKategori($id)
    {
        $kategori = DB::table('kategori')->where('id', $id)->first();
        return view('edit-kategori', compact('kategori'));
    }

    public function updateKategori(Request $request, $id)
    {
        DB::table('kategori')->where('id', $id)->update([
            'nama_kategori' => $request->nama_kategori,
            'keterangan'    => $request->keterangan,
        ]);

        return redirect('/kategori-obat');
    }

    public function destroyKategori($id)
    {
        DB::table('kategori')->where('id', $id)->delete();
        return redirect('/kategori-obat');
    }
}