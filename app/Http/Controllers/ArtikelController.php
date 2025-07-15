<?php

namespace App\Http\Controllers;

use App\Models\DataArtikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {

        $dataArtikel = DataArtikel::all();
        return view('artikel.artikel', compact('dataArtikel'));
    }

    public function show($id)
    {
        $artikel = DataArtikel::findOrFail($id); // Ambil 1 artikel berdasarkan ID
        return view('artikel.show', compact('artikel')); // Tampilkan ke view
    }
}
