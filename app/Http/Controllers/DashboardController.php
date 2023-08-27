<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Obat;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $totalJumlahObat = Obat::sum('jumlah');
        $tanggalHariIni = Carbon::now()->format('Y-m-d');
        $totalPendapatanHariIni = Penjualan::whereDate('created_at', $tanggalHariIni)->sum('total');
        $totalObatTerjualHariIni = Penjualan::whereDate('created_at', $tanggalHariIni)->sum('jumlah');
         $obatStokKurangDari10 = Obat::where('jumlah', '<', 10)->get();

    // Jumlah obat dengan stok kurang dari 10
    $totalObatStokKurangDari10 = $obatStokKurangDari10->count();
        return view('content.dashboard',

            compact(

                'totalJumlahObat',
                'totalObatTerjualHariIni',
                'totalPendapatanHariIni',
                'totalObatStokKurangDari10',
                 'obatStokKurangDari10',
    
    
    
    ));
    }
}
