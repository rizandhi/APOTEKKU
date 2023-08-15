<?php

// app/Models/Pengeluaran.php

namespace App\Models;

use App\Models\Obat;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table = 'tb_pengeluaran';

    protected $primaryKey = 'id_pengeluaran';

    protected $fillable = ['id_obat', 'jumlah', 'harga', 'total_harga'];

    // Definisi relasi many-to-one dengan tb_obat
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }
}
