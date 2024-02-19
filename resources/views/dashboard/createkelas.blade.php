@extends('dashboard.layouts.main')

@section('container')


<form action="{{ route('kelas.store') }}" method="post">
    @csrf

    <div class="mb-3">
        <label for="nama" class="form-label">Nama Kelas</label>
        <input type="text" class="form-control" id="nama" name="nama" required value="{{ old('nama') }}">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="/dashboard/kelas" class="btn btn-secondary">Kembali</a>

    @endsection