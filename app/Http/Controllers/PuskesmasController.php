<?php

namespace App\Http\Controllers;

use App\Models\Puskesmas;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

class PuskesmasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $puskesmas = Puskesmas::with(['district', 'village'])->get();
        return view('admin.puskesmas.index', compact('puskesmas'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $districts = District::all();     // Kecamatan
        $villages = Village::all();       // Desa

        return view('admin.puskesmas.create', compact('districts', 'villages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'district_code' => 'required|exists:indonesia_districts,code',
            'village_code' => 'required|exists:indonesia_villages,code',
            'alamat' => 'nullable|string',
        ]);

        Puskesmas::create([
            'nama' => $request->nama,
            'district_code' => $request->district_code,
            'village_code' => $request->village_code,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.puskesmas.index')->with('success', 'Puskesmas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Puskesmas $puskesmas)
    {
        return view('admin.puskesmas.show', compact('puskesmas'));
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    public function edit(Puskesmas $puskesmas)
    {
        $districts = District::whereHas('city', function($q) {
            $q->where('name', 'Kabupaten Indramayu');
        })->get();

        $villages = Village::where('district_code', $puskesmas->district_code)->get();

        return view('puskesmas.edit', compact('puskesmas', 'districts', 'villages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Puskesmas $puskesmas)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'district_code' => 'required|exists:indonesia_districts,code',
            'village_code' => 'required|exists:indonesia_villages,code',
            'alamat' => 'nullable|string',
        ]);

        $puskesmas->update([
            'nama' => $request->nama,
            'district_code' => $request->district_code,
            'village_code' => $request->village_code,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.puskesmas.index')->with('success', 'Puskesmas berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Puskesmas $puskesmas)
    {
        $puskesmas->delete();
        return redirect()->route('admin.puskesmas.index')->with('success', 'Puskesmas berhasil dihapus');
    }
}
