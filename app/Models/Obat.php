<?php

namespace App\Models;

use App\Models\Suplier;
use App\Models\Kategori;
use App\Models\Penjualan;
// use App\Events\ObatCreated;
// use App\Events\ObatUpdated;
use App\Models\Pengeluaran;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Events\Created;
// use Illuminate\Database\Eloquent\Events\Updated;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'tb_obat';

    protected $primaryKey = 'id_obat';

    protected $fillable = [
        'id_kategori',
        'kode_obat',
        'nama_obat',
        'harga_jual',
        'harga_beli',
        'jumlah',
        'tgl_exp',
        'id_suplier',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function suplier()
    {
        return $this->belongsTo(Suplier::class, 'id_suplier');
    }

    public function pengeluaran()
    {
        return $this->hasMany(Pengeluaran::class, 'id_obat');
    }

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'id_obat');
    }

    // protected $dispatchesEvents = [
    //     'created' => ObatCreated::class, // Menggunakan ObatCreated event
    //     'updated' => ObatUpdated::class, // Menggunakan ObatUpdated event
    // ];
}
