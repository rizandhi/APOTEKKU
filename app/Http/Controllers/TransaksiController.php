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
        // $transaksi = Transaksi::all();
        $obat = Obat::all();
        $pengeluaran = Pengeluaran::all();
        $penjualan = Penjualan::all();
        return view('content.transaksi', [
            // 'transaksi' => $transaksi,
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
    public function tambahjual(Request $request)
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


    public function tambahbeli(Request $request)
{
    // Validasi input
    $request->validate([
        'id_obat' => 'required',
        'jumlah' => 'required|numeric',
        
    ]);

    // Temukan obat berdasarkan ID
    $obat = Obat::findOrFail($request->id_obat);

    // Hitung total harga
    $total_harga = $request->jumlah * $obat->harga_beli;

    // Membuat catatan pengeluaran baru
    $pengeluaran = Pengeluaran::create([
        'id_obat' => $request->id_obat,
        'jumlah' => $request->jumlah,
        'harga' => $obat->harga_beli, // Menggunakan harga beli obat
        'total_harga' => $total_harga,
    ]);

    // Mengupdate jumlah di obat
    $obat->jumlah += $request->jumlah;
    $obat->save();

    return redirect('/transaksi')->with('success', 'Pengeluaran berhasil ditambahkan.');
}


    
    public function updatebeli(Request $request, $id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);

        // Validasi input
        $request->validate([
            'jumlah' => 'required|numeric',
            'harga' => 'required|numeric',
        ]);

        // Menghitung total harga baru
        $total_harga = $request->jumlah * $request->harga;

        // Menghitung selisih jumlah untuk perubahan di obat
        $selisih_jumlah = $request->jumlah - $pengeluaran->jumlah;

        // Mengupdate catatan pengeluaran
        $pengeluaran->update([
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'total_harga' => $total_harga,
        ]);

        // Mengupdate jumlah di obat
        $obat = Obat::findOrFail($pengeluaran->id_obat);
        $obat->jumlah += $selisih_jumlah;
        $obat->save();

        return redirect('/transaksi')->with('success', 'Pengeluaran berhasil diperbarui.');
    }
    public function laporanPenjualan()
    {
        $totalPenjualan = Penjualan::selectRaw('id_obat, SUM(jumlah) as jumlah, SUM(total) as total')
            ->groupBy('id_obat')
            ->with('obat')
            ->get();
        $totalSeluruhPendapatan = Penjualan::sum('total');

        return view(
            'content.transaksi_cetak',
            compact(
                'totalPenjualan',
                'totalSeluruhPendapatan'
            )
        );
    }
    public function laporanPengeluaran()
    {
        $totalPenjualan = Pengeluaran::selectRaw('id_obat, SUM(jumlah) as jumlah, SUM(total_harga) as total_harga')
            ->groupBy('id_obat')
            ->with('obat')
            ->get();
        $totalSeluruhPendapatan = Pengeluaran::sum('total_harga');

        return view(
            'content.transaksi_cetakkeluar',
            compact(
                'totalPenjualan',
                'totalSeluruhPendapatan'
            )
        );
    }
}
