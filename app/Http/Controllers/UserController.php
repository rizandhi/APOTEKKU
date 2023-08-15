<?php

namespace App\Http\Controllers;

use App\Models\Tb_user;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {

        $user = Tb_user::all();
        return view('content.user ', [

            'user' => $user,

        ]);
    }

    public function tambah(Request $request)
    {

        // $request->validate([
        //     'nama_suplier' => 'required',
        //     'nama_agen' => 'required',
        //     'alamat' => 'required',
        //     'kontak' => 'required'
        // ]);

        $user = [
            'username' => $request->username,
            'password' => $request->password,
            'confirmasi_password' => $request->password,
            'level' => $request->level

        ];
        $user['password']=bcrypt($user['password']);
        Tb_user::create($user);



        return redirect('/user');
    }
}
