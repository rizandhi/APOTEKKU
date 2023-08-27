<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Rekap;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RekapController extends Controller
{
    public function index()
    {       
        $obat = Obat::all();
        $rekap = Rekap::all();
        return view('content.rekap', [
            'obat' => $obat,
            'rekap' => $rekap,
        ]);
    }
    public function rekapcetak()
    {
        $totalpendapatan = Rekap::selectRaw('id_obat, jenis, SUM(jumlah) as jumlah, SUM(harga) as harga')
            ->groupBy('id_obat', 'jenis')
            ->with('obat')
            ->get();
        $totalSeluruhPendapatan = Rekap::sum('harga');
 
        return view(
            'content.rekap_cetak',
            compact(
                'totalpendapatan',
               
                'totalSeluruhPendapatan'
            )
        );
    }
}
