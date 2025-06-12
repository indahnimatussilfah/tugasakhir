<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
   use App\Models\DataPenyakit;

class MonitoringPenyakitController extends Controller
{
public function index() {
    $dataPenyakit = DataPenyakit::all(); // Ambil semua data penyakit
    return view('admin.monitoringpenyakit.monitoringpenyakit', compact('dataPenyakit'));
}

}
