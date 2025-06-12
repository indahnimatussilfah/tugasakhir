<?php

namespace App\Http\Controllers;

use App\Models\Dalakes;
use App\Models\DataPenyakit;
use App\Models\DataArtikel;
use Illuminate\Http\Request;

class homeController extends Controller
{
   public function index () {

    $dataPenyakit = DataPenyakit::get(['jumlah', 'nama_penyakit', 'nama_puskesmas']);
    $dataArtikel = DataArtikel::all();

     return view('home.home', compact('dataPenyakit', 'dataArtikel'));
   }
}
