<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\DataArtikel;

class DataArtikelController extends Controller
{
    // Tampilkan semua artikel
    public function index() {
        $dataArtikel = DataArtikel::all();
        return view('admin.dataartikel.dataartikel', compact('dataArtikel'));
    }

    // Tampilkan form tambah artikel baru
    public function create()
    {
        return view('admin.dataartikel.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'     => 'required|string|max:255',
            'isi'       => 'required|string',
            'penulis'   => 'nullable|string|max:255',
            'tanggal'   => 'nullable|date',
            'foto'      => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('artikel_foto', 'public');
        }

        DataArtikel::create($validated);

        return redirect()->route('dataartikel.index')->with('success', 'Artikel berhasil ditambahkan');
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $artikel = DataArtikel::findOrFail($id);
        return view('admin.dataartikel.update', compact('artikel'));
    }

    // Update data artikel
    public function update(Request $request, $id)
    {
        $artikel = DataArtikel::findOrFail($id);

        $validated = $request->validate([
            'judul'     => 'required|string|max:255',
            'isi'       => 'required|string',
            'penulis'   => 'nullable|string|max:255',
            'tanggal'   => 'nullable|date',
            'foto'      => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($artikel->foto) {
                Storage::disk('public')->delete($artikel->foto);
            }
            $validated['foto'] = $request->file('foto')->store('artikel_foto', 'public');
        }

        $artikel->update($validated);

        return redirect()->route('dataartikel.index')->with('success', 'Artikel berhasil diperbarui');
    }

    // Hapus artikel
    public function destroy($id)
    {
        $artikel = DataArtikel::findOrFail($id);

        if ($artikel->foto) {
            Storage::disk('public')->delete($artikel->foto);
        }

        $artikel->delete();

        return redirect()->route('dataartikel.index')->with('success', 'Artikel berhasil dihapus');
    }
}
