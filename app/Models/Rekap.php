<?php

namespace App\Models;

use App\Models\Obat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rekap extends Model
{
    use HasFactory;
    protected $table = 'tb_rekap';

    protected $fillable = [
        'id_obat',
        'jumlah',
        'harga',
        'jenis',
    ];

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }
}
