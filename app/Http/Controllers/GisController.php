<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GisController extends Controller
{
    public function index(Request $request)
    {   
        $dataItem = [
            'id' => $request->id,
            'nama_layanan' => $request->nama_layanan,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'deskripsi' => $request->deskripsi,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'foto' => $request->foto
        ];
        return view('viewgis.viewGis', compact('dataItem'));
    }
}
