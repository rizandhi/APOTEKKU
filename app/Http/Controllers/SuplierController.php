<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SuplierController extends Controller
{
    //
    public function index()
    {
        $supliers = Suplier::all();
        return view('content.data_apotek.suplier', ['suplier' => $supliers]);
    }

    public function getSuplierById($id)
    {
        $suplier = Suplier::findOrFail($id);
        return response()->json($suplier);
    }

    public function tambah(Request $request)
    {

        // $request->validate([
        //     'nama_suplier' => 'required',
        //     'nama_agen' => 'required',
        //     'alamat' => 'required',
        //     'kontak' => 'required'
        // ]);

        $suplier = new Suplier;
        $suplier->nama_suplier = $request->nama_suplier;
        $suplier->nama_agen = $request->nama_agen;
        $suplier->alamat = $request->alamat;
        $suplier->kontak = $request->kontak;
        // dd($suplier);
        $suplier->save();

        return redirect('/suplier');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_suplier' => 'required',
            'nama_agen' => 'required',
            'alamat' => 'required',
            'kontak' => 'required'
        ]);

        $suplier = Suplier::findOrFail($id);
        $suplier->nama_suplier = $request->nama_suplier;
        $suplier->nama_agen = $request->nama_agen;
        $suplier->alamat = $request->alamat;
        $suplier->kontak = $request->kontak;

        $suplier->save();
        return response()->json(['message' => 'Data suplier berhasil diperbarui']);
    }
}
