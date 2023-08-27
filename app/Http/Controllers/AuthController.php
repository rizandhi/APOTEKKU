<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ...
    public function showLoginForm()
    {
        return view('layout.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard');
        } else {
            return redirect()->route('login')->with('error', 'Username atau password salah.');
        }
    }

    public function logout()
    {
        Auth::logout();
         return redirect('/login')->with('success', 'Logout berhasil.');
    }
}
