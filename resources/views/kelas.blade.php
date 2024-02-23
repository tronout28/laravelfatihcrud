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
   
        @foreach ($kelas  as $kelass)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$kelass->nama_kelas }}</td>
        </tr>
        @endforeach
    </table>
</thead>
{!! $kelas->withQueryString()->links('pagination::bootstrap-5') !!} 
@endsection