<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Kelas;

use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
      $students = Student::paginate(10);
      
        return view('student.all', [
        "title"    => "students", 
        "students" => $students
      ]);
    }

    public function show($student) 
    {
      return view('student.detail', [
        "title" => "detail-student",
        "student" => Student::find($student)
      ]);
    }

    public function create()
    {
      return view('dashboard.addsiswa', [
        "title" => "add-student",
        "kelas" => kelas::all()
      ]);
    }

    public function store(Request $request)
    {
       // Validasi data
       $validateData = $request->validate([
        'nis' => 'required|unique:students,nis',
        'nama' => 'required',
        'tanggal_lahir' => 'required|date',
        'kelas_id' => 'required',
        'alamat' => 'required',
      ]);

    // Simpan data ke dalam database
       $hasil = Student::create($validateData);
       if ($hasil) {
        return redirect('/dashboard/student')->with('success', 'Data mahasiswa berhasil ditambahkan');
       }
    }

    public function destroy($id)
    {
        // Temukan data mahasiswa berdasarkan ID
        $student = Student::find($id);
        if (!$student) {
            return redirect('/dashboard/student')->with('error', 'Data mahasiswa tidak ditemukan');
        }
        // Hapus data mahasiswa
        $student->delete();
        return redirect('/dashboard/student')->with('success', 'Data mahasiswa berhasil dihapus');
    }
    public function edit($id)
    {
        $student = Student::find($id);
        return view('dashboard.editsiswa', [
            'title' => 'Edit Siswa',
            'student' => $student,
            "kelas" => kelas::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nis' => 'required|unique:students,nis,' . $id,
            'nama' => 'required',
            'tanggal_lahir' => 'required|date',
            'kelas_id' => 'required',
            'alamat' => 'required',
        ]);

        $student = Student::find($id);
        $student->update($validatedData);

        return redirect('/dashboard/student')->with('success', 'Data mahasiswa berhasil diupdate');
    }
}
