<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('signin.index');
    }


public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        return redirect('/dashboard/index')->with('success', 'Selamat datang! Anda berhasil login.');
    }

    return redirect()->back()->withInput()->withErrors([
        'email' => 'Email atau kata sandi salah.',
    ]);
}


public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/students/all')->with('success', 'Anda berhasil logout');
}

}
