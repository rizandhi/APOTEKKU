<?php

namespace App\Observers;

use App\Models\Pengeluaran;
use App\Models\Rekap;
class PengeluaranObserver
{
    public function created(Pengeluaran $pengeluaran)
    {
         $totalHarga = $pengeluaran->total_harga;
         $hargaMinus = -1 * $totalHarga;
        Rekap::create([
        'id_obat' => $pengeluaran->id_obat,
        'jumlah' => $pengeluaran->jumlah,
        'harga' => $hargaMinus,
        'jenis' => 'Pengeluaran'


        ]);
    }

}