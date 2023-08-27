<?php

namespace App\Observers;
use App\Models\Obat;
use App\Models\Rekap;
use App\Models\Penjualan;

class RekapObserver
{
    public function created(Penjualan $penjualan)
    {
        $totalHarga = $penjualan->total;
        Rekap::create([
        'id_obat' => $penjualan->id_obat,
        'jumlah' => $penjualan->jumlah,
        'harga' =>  $totalHarga,
        'jenis' => 'Pendapatan'

        ]);   
    }

    
}
