@extends('layouts.main')

@section('container')
<h1>Selamat Datang</h1>
@if (Auth::check())
<h2>{{ Auth::user()->name }}</h2>
@else
<h2>User</h2>
@endif
@endsection