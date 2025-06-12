<?php

namespace App\Http\Controllers;

use App\Models\Pelaporan;
use Illuminate\Http\Request;
use App\Notifications\LaporanDiprosesNotification;

class MonitoringPelaporanController extends Controller
{
    public function index()
    {
        $pelaporans = Pelaporan::latest()->get(); // Ambil semua data laporan, urut terbaru
        return view('petugaskesehatan.monitorlap.monitorlap', compact('pelaporans'));
    }

    public function showProcessForm($id)
    {
        $pelaporan = Pelaporan::findOrFail($id);
        return view('petugaskesehatan.monitorlap.process_form', compact('pelaporan'));
    }


    public function process(Request $request, $id)
{
    $laporan = Pelaporan::findOrFail($id);
    $laporan->status = 'diproses';
    $laporan->save();

    // // Kirim notifikasi ke user yang membuat laporan
    // if ($laporan->user) {
    //     $laporan->user->notify(new LaporanDiprosesNotification($laporan));
    // }

    return redirect()->route('monitorlap.index')->with('success', 'Laporan sedang diproses.');
}
}
