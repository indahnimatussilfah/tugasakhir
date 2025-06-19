<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterPetugasKesehatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('registerPetugasKesehatan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string|max:50',
        ]);

       $data =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nik' => 'null',
            'password' => Hash::make($request->password),
            'role' => 'petugas_kesehatan',
        ]);
        return redirect()->route('login.show')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
