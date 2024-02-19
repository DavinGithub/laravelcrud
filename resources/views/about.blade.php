@extends('layouts.main')

@section('container')
    <h3>About Me</h3>
    @if (Auth::check())
    <p>Nama: {{Auth::user()->name }}</p>
    <p>Kelas: {{Auth::user()->email }}</p>
    <p>Foto:</p>
    <img src="{{ asset($foto) }}" alt="Foto Davin" width="200" height="200">
    @else
    <p>Nama: User</p>
    <p>email: User@gmail.com</p>
    <p>Foto: </p>
    <img src="{{ asset($foto) }}" alt="Foto Davin" width="200" height="200">
    @endif
@endsection
