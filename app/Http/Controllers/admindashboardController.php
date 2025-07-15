<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dalakes;
use App\Models\DataArtikel;
use App\Models\DataPenyakit;
use App\Models\Penyakit;
use App\Models\Laporan;
use App\Models\Pelaporan;
use Illuminate\Support\Facades\DB;

class admindashboardController extends Controller
{
    public function index() 
{
    $totalAkun = User::count();
    $totalLayanan = Dalakes::count();
    $totalLaporan = DataArtikel::count();

    $dataPenyakit = DataPenyakit::select('nama_penyakit', DB::raw('SUM(jumlah) as total'))
        ->groupBy('nama_penyakit')
        ->orderByDesc('total')
        ->limit(5)
        ->get();

    $labels = $dataPenyakit->pluck('nama_penyakit')->toArray();
    $data = $dataPenyakit->pluck('total')->toArray();

    return view('admin.dashboard', compact('totalAkun', 'totalLayanan', 'totalLaporan', 'labels', 'data'));
}

}
