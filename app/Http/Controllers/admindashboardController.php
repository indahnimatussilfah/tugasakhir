<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dalakes;
use App\Models\DataArtikel;
use App\Models\DataPenyakit;
use Illuminate\Support\Facades\DB;

class admindashboardController extends Controller
{
    public function index() 
    {
        // Data umum
        $totalAkun = User::count();
        $totalLayanan = Dalakes::count();
        $totalLaporan = DataArtikel::count();

        // 5 penyakit terbanyak (tanpa filter waktu — bisa disesuaikan)
        $dataPenyakit = DataPenyakit::select('nama_penyakit', DB::raw('SUM(jumlah) as total'))
            ->groupBy('nama_penyakit')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $labels = $dataPenyakit->pluck('nama_penyakit')->toArray();
        $data = $dataPenyakit->pluck('total')->toArray();

        // Penyakit per Kecamatan
        $penyakitPerKecamatan = DataPenyakit::select('kecamatan', DB::raw('SUM(jumlah) as total'))
            ->groupBy('kecamatan')
            ->orderByDesc('total')
            ->get();

        $kecamatanLabels = $penyakitPerKecamatan->pluck('kecamatan')->toArray();
        $kecamatanData = $penyakitPerKecamatan->pluck('total')->toArray();

        // Penyakit per Puskesmas
        $penyakitPerPuskesmas = DataPenyakit::select('nama_puskesmas', DB::raw('SUM(jumlah) as total'))
            ->groupBy('nama_puskesmas')
            ->orderByDesc('total')
            ->get();

        $puskesmasLabels = $penyakitPerPuskesmas->pluck('nama_puskesmas')->toArray();
        $puskesmasData = $penyakitPerPuskesmas->pluck('total')->toArray();

        // Kirim ke view
        return view('admin.dashboard', compact(
            'totalAkun',
            'totalLayanan',
            'totalLaporan',
            'labels',
            'data',
            'kecamatanLabels',
            'kecamatanData',
            'puskesmasLabels',
            'puskesmasData'
        ));
    }
}
