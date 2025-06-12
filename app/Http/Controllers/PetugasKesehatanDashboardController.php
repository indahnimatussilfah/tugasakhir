<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPenyakit;
use App\Models\Pelaporan;

class PetugasKesehatanDashboardController extends Controller
{
    public function index()
{
    $totalPenyakit = DataPenyakit::count();
    $totalLaporan = Pelaporan::count();
    $dataPenyakit = DataPenyakit::all(); // ← tambahan ini

    return view('petugaskesehatan.dashboard', compact('totalPenyakit', 'totalLaporan', 'dataPenyakit'));
}

}
