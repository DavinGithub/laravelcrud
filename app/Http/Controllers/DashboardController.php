<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Student;


class DashboardController extends Controller
{
    public function index (){
        return view ('dashboard.index');
    }

    public function kelas()
    {
        $kelas = Kelas::paginate(3);

        return view('dashboard.kelas', [
            'title' => 'Daftar Kelas',
            'kelas' => $kelas,
        ]);
    }

    public function student (){
        $students = Student::paginate(3); 
    
        return view ('dashboard.student', [
            'students' => $students, 
        ]);
    }
    
    public function about(){
        return view ('dashboard.about');
    }

    public function showdashboard($student)
    {
      return view('dashboard.detail', [
        "title" => "detail-student",
        "student" => Student::find($student)
      ]);
    }

}
