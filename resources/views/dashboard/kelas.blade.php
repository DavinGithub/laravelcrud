@extends('dashboard.layouts.main')

@section('container')

<h2>Create Data Kelas</h2>
    


@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@auth
    <a href="/kelas/create/" class="btn btn-outline-success">Add</a>
@endauth
<table class="table">
<thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kelas</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  @php 
        $no = 1;
      @endphp

    @foreach ($kelas as $Kelas)
    <tr>
        <td>{{$no++}}</td>
        <td>{{$Kelas->nama }}</td>
        <td><form action="/kelas/delete/{{$Kelas->id}}" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
            @method('delete')
            @csrf
            <button class="btn btn-danger">Delete</button>
        </form></td>
        
    </tr>
        
    @endforeach
</tbody>
</table>
{!! $kelas->withQueryString()->links('pagination::bootstrap-5') !!}
    @endsection
