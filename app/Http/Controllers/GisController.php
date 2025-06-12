<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GisController extends Controller
{
    public function index(Request $request)
    {
        $lat = $request->lat;
        $lng = $request->lng;
        $nama = $request->nama;
        return view('viewgis.viewGis', compact('lat', 'lng', 'nama'));
    }
}
