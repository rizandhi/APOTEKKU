<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\Penjualan;
use App\Models\Persediaan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Carbon\Carbon;
class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::all();
        $pengeluaran = Pengeluaran::all();
        $penjualan = Penjualan::all();
        return view('content.transaksi', [
            'transaksi' => $transaksi,
            'penjualan' => $penjualan,
            'pengeluaran' => $pengeluaran,
        ]);
    }
}
