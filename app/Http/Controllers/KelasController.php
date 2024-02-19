<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{


    public function index()
    {
        $kelasitem = Kelas::paginate(3);
    
        return view('kelas', [
            'title' => 'Daftar Kelas',
            'kelasitem' => $kelasitem,
        ]);
    }
    



public function create()
{
    $kelas = Kelas::all();

    return view('dashboard.createkelas', [
        'title' => 'Tambah Data Siswa',
        'kelas' => $kelas,
    ]);
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'nama' => 'required',
    ]);

    Kelas::create($validatedData);

    return redirect()->route('dashboard.student')->with('success', 'Data Kelas berhasil ditambahkan');
}   

public function destroy(Kelas $kelas)
    {
      $result = Kelas::destroy($kelas->id);
      if($result) {
        return redirect('/dashboard/kelas')->with('success', 'Data Kelas berhasil dihapus');
      }
    }


}   
