<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Obat;
use App\Models\Penjualan;
use App\Models\Transaksi;
use App\Models\Persediaan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::all();
        $obat = Obat::all();
        $pengeluaran = Pengeluaran::all();
        $penjualan = Penjualan::all();
        return view('content.transaksi', [
            'transaksi' => $transaksi,
            'penjualan' => $penjualan,
            'obat' => $obat,
            'pengeluaran' => $pengeluaran,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_obat' => 'required',
            'jumlah' => 'required|numeric',
        ]);

        $obat = Obat::find($request->id_obat);

        if (!$obat) {
            return back()->with('error', 'Obat tidak ditemukan');
        }

        $total = $obat->harga_jual * $request->jumlah;

        $jual = [
            'id_obat' => $request->id_obat,
            'jumlah' => $request->jumlah,
            'total' => $total,
        ];

        Penjualan::create($jual);

        return redirect('/transaksi');
    }


    public function update()
    {
    }
}
