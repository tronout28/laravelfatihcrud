<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Http\Requests\StoreRegisterRequest;
use App\Http\Requests\UpdateRegisterRequest;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('register.index');
    }

    public function store(Request $request)
{
    $validateData = $request->validate([
        'name'          => 'required|max:255',
        'email'         => 'required|email|unique:users,email', 
        'password'      => 'required|min:5|max:15',
    ]);

    $validateData['password'] = Hash::make($validateData['password']);
    User::create($validateData);
    return redirect()->route('login')->with('success', 'Akun berhasil dibuat, Silahkan login.');
}
}
