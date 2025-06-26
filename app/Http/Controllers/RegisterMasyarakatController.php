<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterMasyarakatController extends Controller
{
    public function index()
    {
        return view('registerMasyarakat');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'nik'       => 'required|string|max:20|unique:users,nik',
            'email'     => 'nullable|email|max:255|unique:users,email',
            'password'  => 'required|string|min:6|confirmed',
            'no_telpon' => 'required|string|max:20',
            'alamat'    => 'required|string|max:255',
        ]);

        User::create([
            'name'      => $request->name,
            'nik'       => $request->nik,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'no_telpon' => $request->no_telpon,
            'alamat'    => $request->alamat,
            'role'      => 'masyarakat', // Set default role masyarakat
        ]);

        return redirect()->route('login.show')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
