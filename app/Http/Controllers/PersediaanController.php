<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Obat;
use App\Models\Persediaan;
use Illuminate\Http\Request;

class PersediaanController extends Controller
{
    public function index()
    {
        $persediaan = Persediaan::all();
        $obat = Obat::all();
        return view('content.data_apotek.persediaan', [
            'persediaan' => $persediaan, 'obat' => $obat,
        ]);
    }
    public function tambah(Request $request)
    {
        $request->validate([
            'id_obat' => 'required',
            'letak' => 'required',
            'jumlah' => 'required|numeric|min:0', // Pastikan jumlah tidak negatif
        ]);

        $obat = Obat::find($request->id_obat);

        if (!$obat) {
            return back()->with('error', 'Obat tidak ditemukan');
        }

        // Tambahkan jumlah obat ke stok di tabel Obat
        $obat->increment('jumlah', $request->jumlah);

        // Simpan data persediaan
        $stok = [
            'id_obat' => $request->id_obat,
            'letak' => $request->letak,
            'jumlah' => $request->jumlah,
        ];

        Persediaan::create($stok);

        return redirect('/persediaan')->with('success', 'Persediaan berhasil ditambahkan');
    }



    
}
