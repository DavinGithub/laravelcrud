@extends('dashboard.layouts.main')

@section('container')
<h3>Detail</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nis</th>
      <th scope="col">Nama</th>
      <th scope="col">Tanggal_Lahir</th>
      <th scope="col">Kelas</th>
      <th scope="col">Alamat</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    @php 
    $no = 1
    @endphp

    <tr>  
      <td>{{$no++}}</td>
      <td>{{$student->nis}}</td>
      <td>{{$student->nama}}</td>
      <td>{{$student->tanggal_lahir}}</td>
      <td>{{ $student->kelas ? $student->kelas->nama : 'Tidak ada kelas' }}</td>
      <td>{{$student->alamat}}</td>
      <td>
        <a href="/dashboard/student" class="btn btn-primary">Kembali</a>
      </td>

    </tr>
  </tbody>
</table>

@endsection