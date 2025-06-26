<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    public function showLogin()
    {
        return view('login');
    }

  public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Attempt to log in
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $role = Auth::user()->role;

        if ($role === 'masyarakat') {
            return redirect()->route('home.index')->with('success', 'Anda berhasil login');
        } else if ($role === 'petugas_kesehatan') {
            return redirect()->route('dashboardPetugasKesehatan.index')->with('success', 'Anda berhasil login');
        } else if ($role === 'admin') {
            return redirect()->route('dashboardAdmin.index')->with('success', 'Anda berhasil login');
        // } else if ($role === 'petugas_analis') {
        //     return redirect()->route('dashboardPetugasanalis.index')->with('success', 'Anda berhasil login');
        } else {
            Auth::logout(); // Unrecognized role
            return redirect()->route('login.show')->with('failed', 'Role tidak dikenali');
        }
    }

    // Login failed
    return redirect()->route('login.show')->with('failed', 'Login gagal username dan password salah');
}
public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login.show')->with('success', 'Anda berhasil logout');
}


}
