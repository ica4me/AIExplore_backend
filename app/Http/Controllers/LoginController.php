<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['email' => 'Akun kamu tidak di ketahui']);
    }

    public function update(Request $request)
    {
        // Logika validasi dan pembaruan password

        // Setelah pembaruan berhasil
        Auth::logout();

        return redirect()->route('login')->with('status', 'Berhasil update password, silahkan login kembali');
    }
}
