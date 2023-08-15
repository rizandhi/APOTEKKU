<?php

// app/Models/Persediaan.php

namespace App\Models;

use App\Models\Obat;
use Illuminate\Database\Eloquent\Model;

class Persediaan extends Model
{
    protected $table = 'tb_persediaan';

    protected $primaryKey = 'id_persediaan';

    protected $fillable = ['id_obat', 'letak'];

    // Definisi relasi many-to-one dengan tb_obat
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }
}
