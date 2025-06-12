<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dalakes;
use Illuminate\Support\Facades\Storage;

class DalakesController extends Controller
{
    // Tampilkan semua data layanan kesehatan dengan kolom tertentu
    public function index()
    {
        $dataLayanan = Dalakes::all(['id', 'nama_layanan', 'alamat', 'telepon', 'foto', 'deskripsi', 'latitude', 'longitude']);
        return view('admin.dalakes.dalakes', compact('dataLayanan'));
    }

    public function create()
    {
        return view('admin.dalakes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'alamat'       => 'required|string',
            'telepon'      => 'nullable|string|max:20',
            'deskripsi'    => 'nullable|string',
            'foto'         => 'nullable|image|max:2048',
            'latitude'     => 'nullable|numeric',
            'longitude'    => 'nullable|numeric',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('layanan_foto', 'public');
        }

        Dalakes::create($validated);

        return redirect()->route('dalakes.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $layanan = Dalakes::findOrFail($id);
        return view('admin.dalakes.update', compact('layanan'));
    }

    public function update(Request $request, $id)
    {
        $layanan = Dalakes::findOrFail($id);

        $validated = $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'alamat'       => 'required|string',
            'telepon'      => 'nullable|string|max:20',
            'deskripsi'    => 'nullable|string',
            'foto'         => 'nullable|image|max:2048',
            'latitude'     => 'nullable|numeric',
            'longitude'    => 'nullable|numeric',
        ]);

        if ($request->hasFile('foto')) {
            if ($layanan->foto) {
                Storage::disk('public')->delete($layanan->foto);
            }
            $validated['foto'] = $request->file('foto')->store('layanan_foto', 'public');
        }

        $layanan->update($validated);

        return redirect()->route('dalakes.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $layanan = Dalakes::findOrFail($id);
        if ($layanan->foto) {
            Storage::disk('public')->delete($layanan->foto);
        }
        $layanan->delete();

        return redirect()->route('dalakes.index')->with('success', 'Data berhasil dihapus');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        $data = Dalakes::where('nama_layanan', 'like', '%' . $query . '%')->get();

        return response()->json($data->map(function ($item) {
            return [
                'id' => $item->id,
                'nama_layanan' => $item->nama_layanan,
                'alamat' => $item->alamat,
                'telepon' => $item->telepon,
                'deskripsi' => $item->deskripsi,
                'latitude' => $item->latitude,
                'longitude' => $item->longitude,
                'foto' => $item->foto ? asset('storage/' . $item->foto) : null,
            ];
        }));
    }
}
