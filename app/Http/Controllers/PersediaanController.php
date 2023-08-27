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


    public function kurangStok($id_obat)
    {
        $obat = Obat::find($id_obat);

        if ($obat) {
            if ($obat->jumlah > 0) {
                $obat->decrement('jumlah', 1);

                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'message' => 'Stok obat sudah habis']);
            }
        }

        return response()->json(['success' => false, 'message' => 'Obat tidak ditemukan']);
    }

    public function tambahStok($id_obat)
    {
        $obat = Obat::find($id_obat);

        if ($obat) {
            $obat->increment('jumlah', 1);

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Obat tidak ditemukan']);
    }
}
