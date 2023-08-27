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
        return view('content.dashboard',

            compact(

                'totalJumlahObat',
                'totalObatTerjualHariIni',
                'totalPendapatanHariIni'
    
    
    
    ));
    }
}
