@extends('layouts.main')

@section('container')
    <h3>List Kelas</h3>
    <table class="table">
        <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Kelas</th>
            </tr>
          </thead>
          @php
              $no = 1;
          @endphp
   
        @foreach ($kelasitem  as $kelass)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$kelass->nama }}</td>
        </tr>
        @endforeach
    </table>
</thead>
{!! $kelasitem->withQueryString()->links('pagination::bootstrap-5') !!} 
        
    
    
@endsection
