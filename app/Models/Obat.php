<?php

// app/Models/Obat.php

namespace App\Models;

use App\Models\Suplier;
use App\Models\Kategori;
use App\Models\Penjualan;
use App\Models\Pengeluaran;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'tb_obat';

    protected $primaryKey = 'id_obat';

    protected $fillable = ['id_kategori', 'kode_obat', 'nama_obat', 'harga_jual', 'jumlah', 'tgl_exp', 'id_suplier'];

    // Definisi relasi many-to-one dengan tb_kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    // Definisi relasi many-to-one dengan tb_suplier
    public function suplier()
    {
        return $this->belongsTo(Suplier::class, 'id_suplier');
    }

    // Definisi relasi one-to-many dengan tb_pengeluaran
    public function pengeluaran()
    {
        return $this->hasMany(Pengeluaran::class, 'id_obat');
    }

    // Definisi relasi one-to-many dengan tb_penjualan
    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'id_obat');
    }
}
