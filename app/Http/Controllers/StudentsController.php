<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Kelas;

use Illuminate\Http\Request;


class StudentsController extends Controller
{
  public function index (){
    $students = Student::paginate(3 ); 

    return view ('student.all', [
        'students' => $students, 
    ]);
}

    public function show($student)
    {
      return view('student.detail', [
        "title" => "detail-student",
        "student" => Student::find($student)
      ]);
    }

    

    public function create()
{
  return view('dashboard.create', [
    "title" => "create-student",
    "kelas" => Kelas::all()
  ]);                  
}


public function store(Request $request)
{
    $validateData = $request->validate([
        'nis'           => 'required',
        'nama'          => 'required',
        'tanggal_lahir' => 'required|date',
        'kelas_id'      => 'required', 
        'alamat'        => 'required',
    ]);

    $result = Student::create($validateData);
    if ($result) {
        return redirect('/dashboard/student')->with('success', 'Data siswa berhasil ditambahkan');
    }
}


    public function destroy(Student $student)
    {
      $result = Student::destroy($student->id);
      if($result) {
        return redirect('/dashboard/student')->with('success', 'Data siswa berhasil dihapus');
      }
    }

    public function edit(Student $student)
    {
      return view('dashboard.edit',[
        "title" => "edit-data",
        "student" => $student,
        "kelas" => Kelas::all()
      ]);
    }

    public function update(Request $request, Student $student)
    {
      $validateData = $request->validate([
        'nis'           => 'required',
        'nama'          => 'required',
        'tanggal_lahir' => 'required|date',
        'kelas_id'      => 'required',
        'alamat'        => 'required',
    ]);
    $result = Student::where('id', $student->id)->update($validateData);

    if ($result) {
      return redirect('/dashboard/student')->with('success', 'Data siswa berhasil diubah !');
    }
    }
}
