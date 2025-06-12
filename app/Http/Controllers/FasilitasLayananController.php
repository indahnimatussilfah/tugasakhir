<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FasilitasLayananController extends Controller
{
    public function index() {
        return view('fasilitaslayanan.fasilitaslayanan');
    }
}
