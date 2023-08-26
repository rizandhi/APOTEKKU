<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $obat = Obat::all();
        return view('content.transaksi', compact( 'obat'));
    }

}
