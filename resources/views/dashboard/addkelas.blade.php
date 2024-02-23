@extends('dashboard.layouts.main')

@section('container')


<form action="{{ route('kelas.store') }}" method="post">
    @csrf

    <div class="mb-3">
        <label for="nama_kelas" class="form-label">Nama Kelas</label>
        <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required value="{{ old('nama_kelas') }}">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="/dashboard/kelas" class="btn btn-secondary">Kembali</a>
</form>


    @endsection