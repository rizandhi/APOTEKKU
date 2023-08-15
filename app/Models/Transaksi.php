<?php

// app/Models/Transaksi.php

namespace App\Models;

use App\Models\Penjualan;
use App\Models\Pengeluaran;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'tb_transaksi';

    protected $primaryKey = 'id_transaksi';

    protected $fillable = ['id_penjualan', 'id_pengeluaran'];

    // Definisi relasi one-to-one dengan tb_penjualan
    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'id_penjualan');
    }

    // Definisi relasi one-to-one dengan tb_pengeluaran
    public function pengeluaran()
    {
        return $this->belongsTo(Pengeluaran::class, 'id_pengeluaran');
    }
}
