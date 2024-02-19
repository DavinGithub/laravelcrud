@extends('dashboard.layouts.main')

@section('container')
  <h3>Data Siswa</h3>
  @if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ session('success') }}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
 

  @auth
    <a href="/student/create/" class="btn btn-outline-success">Add</a>
  @endauth

  <table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nis</th>
        <th scope="col">Nama</th>
        <th scope="col">Kelas</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @php 
        $no = 1;
      @endphp

      @foreach ($students as $student)
      <tr>  
        <td>{{$no++}}</td>
        <td>{{$student->nis}}</td>
        <td>{{$student->nama}}</td>
        <td>{{ $student->kelas ? $student->kelas->nama : 'Tidak ada kelas' }}</td>

        
        <td>
          <a href="/dashboard/detail/{{$student->id}}" class="btn btn-primary">Detail</a>
          
          @auth 
            <a href="/student/edit/{{$student->id}}" class="btn btn-warning">Edit</a>
            <form action="/students/delete/{{$student->id}}" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
              @method('delete')
              @csrf
              <button class="btn btn-danger">Delete</button>
            </form>
          @endauth 
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {!! $students->withQueryString()->links('pagination::bootstrap-5') !!}
@endsection
