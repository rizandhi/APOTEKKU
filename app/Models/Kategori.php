<?php
// app/Models/Kategori.php

namespace App\Models;

use App\Models\Obat;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'tb_kategori';

    protected $primaryKey = 'id_kategori';

    protected $fillable = ['kategori', 'keterangan'];

    // Definisi relasi one-to-many dengan tb_obat
    public function obat()
    {
        return $this->hasMany(Obat::class, 'id_kategori');
    }
}
