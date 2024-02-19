@extends('dashboard.layouts.main')

@section('container')
    <h3>About Me</h3>
    <p>Nama: {{Auth::user()->name }}</p>
    <p>Kelas: {{Auth::user()->email }}</p>
    <p>Password: {{Auth::user()->password}}</p>
@endsection
    