@extends('dashboard.layouts.main')

@section('container')
  <h3>Data Siswa</h3>
  @if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ session('success') }}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
 

  @auth
    <a href="/dashboard/addsiswa" class="btn btn-outline-success">Add</a>
  @endauth
  
  {!! $students->withQueryString()->links('pagination::bootstrap-5') !!}

  <table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nis</th>
        <th scope="col">Nama</th>
        <th scope="col">Kelas</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @php 
        $no = 1;
      @endphp

      @foreach ($students as $student)
      <tr>  
        <td>{{$no++}}</td>
        <td>{{$student->nis}}</td>
        <td>{{$student->nama}}</td>
        <td>{{$student->kelas->nama_kelas}}</td>
          <td>
          <a href="/dashboard/detail/{{$student->id}}"  class="btn btn-outline-primary">Detail</a>
          @auth 
            <a href="/dashboard/editsiswa/{{$student->id}}" class="btn btn-outline-warning" >Edit</a>
            <form action="/student/delete/{{$student->id}}" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
              @method('delete')
              @csrf
              <button class="btn btn-outline-danger" >Delete</button>
            </form>
          @endauth 
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <script>
    function confirmDelete(studentId) {
        var result = confirm("Apakah Anda yakin ingin menghapus siswa?");
        if (result) {
            document.getElementById('deleteForm_' + studentId).submit();
        }
    }
</script>
@endsection