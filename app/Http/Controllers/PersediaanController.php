<?php

namespace App\Http\Controllers;

use App\Models\Persediaan;
use Illuminate\Http\Request;
use Carbon\Carbon;
class PersediaanController extends Controller
{
    public function index()
    {
        $persediaan = Persediaan::all();
        return view('content.data_apotek.persediaan', [
            'persediaan' => $persediaan,
        ]);
    }
}
