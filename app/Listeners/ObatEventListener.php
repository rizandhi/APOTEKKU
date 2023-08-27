<?php
// app/Listeners/ObatEventListener.php

namespace App\Listeners;

use App\Models\Pengeluaran;
use Illuminate\Support\Facades\Log;
use App\Events\ObatCreated;
use App\Events\ObatUpdated;

class ObatEventListener
{
    public function tambah(ObatCreated $event)
    {
        $obat = $event->obat;

        Log::info("Listener 'tambah' dijalankan. Obat ID: {$obat->id_obat}");

        $pengeluaran = new Pengeluaran([
            'id_obat' => $obat->id_obat,
            'jumlah' => $obat->jumlah,
            'harga' => $obat->harga_beli,
            'total_harga' => $obat->jumlah * $obat->harga_beli,
        ]);

        $pengeluaran->save();
    }

    public function updated(ObatUpdated $event)
    {
        $obat = $event->obat;

        if ($obat->isDirty('jumlah')) {
            Log::info("Listener 'updated' dijalankan. Obat ID: {$obat->id_obat}");

            $jumlahAwal = $obat->getOriginal('jumlah');
            $selisih = $obat->jumlah - $jumlahAwal;
            $harga = $obat->harga_beli;

            $pengeluaran = new Pengeluaran([
                'id_obat' => $obat->id_obat,
                'jumlah' => $selisih,
                'harga' => $harga,
                'total_harga' => $selisih * $harga,
            ]);

            $pengeluaran->save();
        }
    }
}
