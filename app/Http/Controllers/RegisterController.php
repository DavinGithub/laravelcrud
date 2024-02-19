<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Kelas;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Tambahkan ini untuk mengimpor namespace Hash
use App\Models\User; // Pastikan Anda mengimpor model User jika belum dilakukan

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('register.index');
    }

    public function store(Request $request)
{
    $validateData = $request->validate([
        'name'          => 'required|max:255',
        'email'         => 'required|email|unique:users,email', 
        'password'      => 'required|min:5|max:15',
    ]);

    // Hash password
    $validateData['password'] = Hash::make($validateData['password']);

    // Simpan data
    User::create($validateData);

    return redirect()->route('login')->with('success', 'Akun berhasil dibuat, Silahkan login.');
}

}
