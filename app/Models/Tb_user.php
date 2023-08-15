<?php

namespace App\Models;

use App\Models\Penjualan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Tb_user extends Model
{
    protected $table = 'tb_user';

    protected $primaryKey = 'id_user';

    protected $fillable = ['username', 'confirmasi_password', 'password', 'level'];

    // Definisi relasi one-to-many dengan tb_penjualan
    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'id_user');
    }
}
