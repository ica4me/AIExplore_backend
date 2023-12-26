<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    
      
    // Show the login form
    public function showLoginForm()
    {
        return view('login');
    }

    // Handle login attempt
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Di dalam method login di AuthController
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }

        // Jika login gagal, set flash message
        session()->flash('login_failed', 'Login kamu gagal');
        return back();
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
