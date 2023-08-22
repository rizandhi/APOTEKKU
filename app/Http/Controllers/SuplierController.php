<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SuplierController extends Controller
{
    //
    public function index()
    {
        $suplier = Suplier::all();
        return view('content.data_apotek.suplier', ['suplier' => $suplier]);
    }

    public function getSuplierById($id)
    {
        $suplier = Suplier::findOrFail($id);
        return response()->json($suplier);
    }

    public function tambah(Request $request)
    {

        // $request->validate([
        //     'nama_suplier' => 'required',
        //     'nama_agen' => 'required',
        //     'alamat' => 'required',
        //     'kontak' => 'required'
        // ]);
        $suplier = [
            'nama_suplier' => $request->nama_suplier,
            'nama_agen' => $request->nama_agen,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,

        ];

        Suplier::create($suplier);

        return redirect('/suplier');
    }

    public function edit($id)
    {
        // Mengambil data suplier berdasarkan ID
        $suplier = Suplier::find($id);

        // Mengirim data suplier sebagai respons JSON
        return response()->json($suplier);
    }

    public function update(Request $request, $id_suplier)
    {
        $request->validate([
            'edit_nama_suplier' => 'required',
            'edit_nama_agen' => 'required',
            'edit_alamat' => 'required',
            'edit_kontak' => 'required'
        ]);

        $suplier = Suplier::find($id_suplier);

        if ($suplier) {
            $suplier->update([
                'nama_suplier' => $request->input('edit_nama_suplier'),
                'nama_agen' => $request->input('edit_nama_agen'),
                'alamat' => $request->input('edit_alamat'),
                'kontak' => $request->input('edit_kontak'),
            ]);
        }

        return redirect('/suplier');
    }



    public function hapus($id_suplier)
    {
        $suplier = Suplier::find($id_suplier);

        if ($suplier) {
            $suplier->delete();
        }

        return redirect('/suplier');
    }
}
