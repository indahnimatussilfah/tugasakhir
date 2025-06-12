<?php

namespace App\Http\Controllers;

use App\Models\DataArtikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index () {

        $dataArtikel = DataArtikel::all();
        return view ('artikel.artikel', compact('dataArtikel'));
    }
}
