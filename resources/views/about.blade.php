@extends('layouts.main')

@section('container')
<h1>{{$nama}}</h1>
    <h2>{{$kelas}}</h2>
    <img src="{{ $foto }}" alt="ini aku" width=500px>
@endsection