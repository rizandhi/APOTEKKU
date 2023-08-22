<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ObatController extends Controller
{
    public function index()
    {
        $obat = Obat::all();
        return view('content.data_apotek.obat', ['obat' => $obat]);
    }

    public function tambah(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required',
            'kategori' => 'required',
            'jenis_obat' => 'required',
            'harga_jual' => 'required',
            'stock' => 'required',
            'suplier' => 'required',
            'exp' => 'required',
        ]);

        $obatData = [
            'nama_obat' => $request->nama_obat,
            'kategori' => $request->kategori,
            'jenis_obat' => $request->jenis_obat,
            'harga_jual' => $request->harga_jual,
            'stock' => $request->stock,
            'suplier' => $request->suplier,
            'exp' => $request->exp,
        ];

        Obat::create($obatData);

        return redirect('/obat');
    }

    public function edit($id)
    {
        $obat = Obat::find($id);
        return response()->json($obat);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'edit_nama_obat' => 'required',
            'edit_kategori' => 'required',
            'edit_harga' => 'required',
            'edit_stok' => 'required',
            'edit_exp' => 'required',
        ]);

        $obat = Obat::find($id);

        if ($obat) {
            $obat->update([
                'nama_obat' => $request->input('edit_nama_obat'),
                'kategori' => $request->input('edit_kategori'),
                'harga' => $request->input('edit_harga'),
                'stok' => $request->input('edit_stok'),
                'exp' => $request->input('edit_exp'),
            ]);
        }

        return redirect('/obat');
    }

    public function hapus($id)
    {
        $obat = Obat::find($id);

        if ($obat) {
            $obat->delete();
        }

        return redirect('/obat');
    }
}
