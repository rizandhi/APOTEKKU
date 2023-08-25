<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Suplier;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Kategori;
use Illuminate\Support\Str;


class ObatController extends Controller
{
    public function index()
    {
        $obat = Obat::all();
        $suppliers = Suplier::all();
        $kategori = Kategori::all();
        return view('content.data_apotek.obat', compact('suppliers', 'kategori', 'obat'));
    }

    // public function tambah(Request $request)
    // {

    //     $validatedData = $request->validate([
    //         'nama_obat' => 'required',
    //         'id_suplier' => 'required',
    //         'id_kategori' => 'required',
    //         'harga_jual' => 'required',
    //         'jumlah' => 'required',
    //         'tgl_exp' => 'required',
    //     ]);

    //     $kategori = Kategori::findOrFail($request->id_kategori);

    //     // // Generate the code based on the category and a random number
    //     $randomNumber = rand(100, 999);
    //     $kode_obat = strtoupper(substr($kategori->kategori, 0, 3)) . $randomNumber;

    //     $tambahobat=[
    //         // 'kode_obat' => $kode_obat,
    //         'nama_obat' => $request->nama_obat,
    //         'id_suplier' => $request->id_suplier,
    //         'id_kategori' => $request->id_kategori,
    //         'harga_jual' => $request->harga_jual,
    //         'jumlah' => $request->jumlah,
    //         'tgl_exp' => $request->tgl_exp,
    //         // 'katerangan' => $request->katerangan,
    //         // ... (atribut lainnya)
    //     ];
    //     // dd($tambahobat);
    //     Obat::create($tambahobat);
    //     return redirect('/obat')->with('success', 'Data obat berhasil ditambahkan.');

    //     // return redirect('/obat')->with('success', 'Data obat berhasil ditambahkan.');
    // }
    public function tambah(Request $request)
    {
        $validatedData = $request->validate([
            'nama_obat' => 'required',
            'id_suplier' => 'required',
            'id_kategori' => 'required',
            'harga_jual' => 'required',
            'jumlah' => 'required',
            'tgl_exp' => 'required',
        ]);

        $kategori = Kategori::findOrFail($request->id_kategori);
        // // Generate the code based on the category and a random number
        $randomNumber = rand(100, 999);
        $kode_obat = strtoupper(Str::substr($kategori->kategori, 0, 3)) . $randomNumber;

        $tambahobat = array_merge($validatedData, [
            'kode_obat' => $kode_obat,
        ]);
        // dd($tambahobat);
        Obat::create($tambahobat);
        return redirect('/obat')->with('success', 'Data obat berhasil ditambahkan.');
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
