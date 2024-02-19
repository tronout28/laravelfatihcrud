<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;


class KelasController extends Controller
{   
    public function index()
    {
        $kelasitem = kelas::paginate(5);

        return view('kelas', [
            'title' => 'Daftar Kelas',
            'kelas' => $kelasitem,
        ]);
    }


public function create()
{
    $kelasitem = Kelas::all();

    return view('dashboard.createkelas', [
        'title' => 'Tambah Data Siswa',
        'kelas' => $kelasitem,
    ]);
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'nama' => 'required',
    ]);

    Kelas::create($validatedData);

    return redirect()->route('dashboard.student')->with('success', 'Data Kelas berhasil ditambahkan');
}   

public function destroy(Kelas $kelasitem)
    {
      $result = Kelas::destroy($kelasitem->id);
      if($result) {
        return redirect('/dashboard/kelas')->with('success', 'Data Kelas berhasil dihapus');
      }
    }



}