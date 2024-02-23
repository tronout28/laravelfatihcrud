@extends('layouts.main')

@section('container')
<h3>Daftar Siswa</h3>

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('success')}}</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">NIS</th>
      <th scope="col">Nama</th>
      <th scope="col">Kelas</th>
      <th scope="col">action</th>
      <!-- <a href="/student/add/" class="btn btn-outline-success">Add</a> -->
    </tr>
  </thead>
  <tbody>
  @php
  $no = 1
  @endphp

    @foreach($students as $student)
    
    <tr>
      <th scope="row">{{$no++}}</th>
      
      <td>{{$student["nis"]}}</td>
      <td>{{$student["nama"]}}</td>
      <td>{{$student->kelas->nama_kelas}}</td>
      
      <td>
      <a href="/student/detail/{{$student->id}}" class="btn btn-outline-primary">Detail</a>
      <!-- <a href="/student/edit/{{$student->id}}" class="btn btn-outline-warning">Edit</a>
      <form action="/student/delete/{{$student->id}}" method="post" class="d-inline" id="deleteForm_{{ $student->id }}">
          @method('delete')
          @csrf
          <button type="button" class="btn btn-outline-danger" onclick="confirmDelete('{{ $student->id }}')">Delete</button>
      </form> -->
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<script>
    function confirmDelete(studentId) {
        var result = confirm("Apakah Anda yakin ingin menghapus siswa?");
        if (result) {
            // Jika pengguna menekan OK, kirim form penghapusan
            document.getElementById('deleteForm_' + studentId).submit();
        }
    }
</script>
@endsection