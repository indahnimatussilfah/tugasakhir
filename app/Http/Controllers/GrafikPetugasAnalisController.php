<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GrafikPetugasAnalisController extends Controller
{
    public function index() {
        return view('petugasanalis.grafik.grafik');
    }
}
