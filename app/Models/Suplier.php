<?php

// app/Models/Suplier.php

namespace App\Models;

use App\Models\Obat;
use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    protected $table = 'tb_suplier';

    protected $primaryKey = 'id_suplier';

    protected $fillable = ['nama_suplier', 'nama_agen', 'alamat', 'kontak'];

    // Definisi relasi one-to-many dengan tb_obat
    public function obat()
    {
        return $this->hasMany(Obat::class, 'id_suplier');
    }
}
