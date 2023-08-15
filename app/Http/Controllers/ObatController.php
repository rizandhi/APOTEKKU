<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    //
    public function index()
    {
        $obat = Obat::all();
        return view('content.data_apotek.obat', [
            'obat' => $obat,
        ]);
    }
}
