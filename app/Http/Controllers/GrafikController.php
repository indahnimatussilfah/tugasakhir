<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPenyakit;

class GrafikController extends Controller
{
    public function index()
    {
        $dataPenyakit = DataPenyakit::get(['jumlah', 'nama_penyakit', 'nama_puskesmas']);
        return view('grafik.grafik', compact('dataPenyakit'));
    }
}
