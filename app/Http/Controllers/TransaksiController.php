<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Penjualan;
use App\Models\Transaksi;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function tambah(Request $request)
    {
        $request->validate([
            'id_obat' => 'required',
            'jumlah' => 'required|numeric',
        ]);

        $obat = Obat::find($request->id_obat);

        if (!$obat) {
            return back()->with('error', 'Obat tidak ditemukan');
        }

        if ($obat->jumlah < $request->jumlah) {
            return back()->with('error', 'Stok obat tidak mencukupi');
        }

        $total = $obat->harga_jual * $request->jumlah;

        // Kurangi jumlah obat
        $obat->decrement('jumlah', $request->jumlah);

        $jual = [
                'id_obat' => $request->id_obat,
                'jumlah' => $request->jumlah,
                'total' => $total,
            ];

        Penjualan::create($jual);

        return redirect('/transaksi');
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
