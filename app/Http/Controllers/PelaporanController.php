<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pelaporan;
use App\Notifications\JawabanPelaporanNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Notifications\LaporanBaruNotification;

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

         $pelaporan = Pelaporan::create([
            'user_id' => auth()->id(),
            'nama' => $request->nama,
            'gejala' => implode(', ', $request->gejala), // Gabungkan array menjadi string
            'keterangan' => $request->keterangan,
            'status' => 'belum_diproses'
        ]);

        User::where('role', 'petugas_kesehatan')->firstOrFail()->notify(new LaporanBaruNotification($pelaporan));
   

        return back()->with('success', 'Laporan berhasil dikirim!');
    }


    public function edit(string $id)
    {

        $penyakit = Pelaporan::findOrFail($id);

        return view('petugaskesehatan.monitorlap.createJawaban', compact('penyakit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jawaban' => 'required|string'
        ]);

        $dataPelaporan = Pelaporan::findOrFail($id);

        $dataPelaporan->update([
            'jawaban' => $request->jawaban,
            'status' => 'sudah_diproses',
        ]);

        // dikirim ke user yang user id nya sama


        User::where('id', $dataPelaporan->user_id)->firstOrFail()->notify(new JawabanPelaporanNotification($dataPelaporan));

        return redirect()->route('monitorlap.index')->with('success', 'Berhasil menambahkan jawaban pelaporan');
    }

    public function show(string $id)
    {

        $penyakit = Pelaporan::findOrFail($id);

        return view('petugaskesehatan.monitorlap.viewDetailDataPenyakit', compact('penyakit'));
    }
}
