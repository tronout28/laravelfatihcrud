<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;


class KelasController extends Controller
{   
    public function index()
    {
        $kelas = Kelas::paginate(3);
    
        return view('kelas', [
            'title' => 'Daftar Kelas',
            'kelas' => $kelas,
        ]);
    }
    

public function create()
{
    $kelas = Kelas::all();

    return view('dashboard.addkelas', [
        'title' => 'Tambah Data Siswa',
        'kelas' => $kelas,
    ]);
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'nama_kelas' => 'required',
    ]);

    Kelas::create($validatedData);
    return redirect()->route('dashboard.student')->with('success', 'Data Kelas berhasil ditambahkan');
}   

public function destroy(Kelas $kelas)
    {
      $result = Kelas::destroy($kelas->id);
      if($result) {
        return redirect('/dashboard/kelas')->with('success', 'Data Kelas berhasil dihapus');
      }
    }


}