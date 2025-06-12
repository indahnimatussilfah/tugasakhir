<?php

namespace App\Http\Controllers;
use App\Models\Pelaporan;


use Illuminate\Http\Request;

class PelaporanController extends Controller
{
    public function index()
    {
        return view('pelaporan.pelaporan');
    }

   public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'gejala' => 'required|array', // Ubah menjadi array
        'gejala.*' => 'string',       // Pastikan tiap item adalah string
        'keterangan' => 'nullable|string',
    ]);

    Pelaporan::create([
        'nama' => $request->nama,
        'gejala' => implode(', ', $request->gejala), // Gabungkan array menjadi string
        'keterangan' => $request->keterangan,
    ]);

    return back()->with('success', 'Laporan berhasil dikirim!');
}

}