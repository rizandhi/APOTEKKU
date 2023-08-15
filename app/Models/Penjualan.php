<?php

// app/Models/Penjualan.php

namespace App\Models;

use App\Models\Obat;
use App\Models\Tb_user;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'tb_penjualan';

    protected $primaryKey = 'id_penjualan';

    protected $fillable = ['id_obat', 'jumlah', 'total', 'id_user'];

    // Definisi relasi many-to-one dengan tb_obat
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }

    // Definisi relasi many-to-one dengan tb_user
    public function user()
    {
        return $this->belongsTo(Tb_user::class, 'id_user');
    }

    // Definisi relasi one-to-one dengan tb_transaksi
    public function transaksi()
    {
        return $this->hasOne(Transaksi::class, 'id_penjualan');
    }
}
