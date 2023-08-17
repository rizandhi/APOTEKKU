<?php

namespace App\Http\Controllers;

use App\Models\Tb_user;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {

        $user1 = Tb_user::all();
        $user = Tb_user::all();
        return view('content.user ', [

            'user' => $user,
            'user1' => $user1,

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
    public function edit($id_user)
    {
        $user = Tb_user::find($id_user);
        return response()->json($user);
    }

    public function update(Request $request, $id_user)
    {
        $request->validate([
            'edit_username' => 'required',
            'edit_level' => 'required'
        ]);

        $user = Tb_user::find($id_user);

        if ($user) {
            $user->update([
                'username' => $request->edit_username,
                'password' => bcrypt($request->edit_password),
                'confirmasi_password' => $request->edit_password,
                'level' => $request->edit_level
            ]);
        }

        return redirect('/user');
    }

    public function hapus($id)
    {
        $user = Tb_user::find($id);

        if ($user) {
            $user->delete();
        }

        return redirect('/user');
    }




    
}
