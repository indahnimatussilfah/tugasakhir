<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPenyakit;
use App\Models\Pelaporan;
use Illuminate\Support\Facades\DB;

class PetugasKesehatanDashboardController extends Controller
{
    public function index()
    {
        $totalPenyakit = DataPenyakit::count();
        $totalLaporan = Pelaporan::count();

        // Ambil data penyakit terbanyak
        $dataPenyakit = DataPenyakit::select('nama_penyakit', DB::raw('SUM(jumlah) as total'))
            ->groupBy('nama_penyakit')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        // Konversi ke array agar aman untuk json_encode di Blade
        $labels = $dataPenyakit->pluck('nama_penyakit')->toArray();
        $data = $dataPenyakit->pluck('total')->toArray();

        return view('petugaskesehatan.dashboard', [
            'totalPenyakit' => $totalPenyakit,
            'totalLaporan'  => $totalLaporan,
            'labels'        => $labels,
            'data'          => $data
        ]);
    }
}
