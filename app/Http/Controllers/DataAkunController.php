<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\ExportDataAkun;
use Maatwebsite\Excel\Facades\Excel;

class DataAkunController extends Controller
{
    // Menampilkan semua data akun dari tabel users
    public function index()
    {
        $data = User::all();
        return view('admin.dataakun.dataakun', compact('data'));
    }

    // Menampilkan form edit akun
    public function edit($id)
    {
        $akun = User::findOrFail($id);
        return view('admin.dataakun.update', compact('akun'));
    }

    // Memperbarui data akun
    public function update(Request $request, $id)
    {
        $akun = User::findOrFail($id);

        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $id,
            'role'  => 'required|string|max:50',
            'nik'   => 'nullable|string|max:20|unique:users,nik,' . $id,
        ]);

        $akun->update($validated);

        return redirect()->route('dataakun.index')->with('success', 'Data akun berhasil diperbarui.');
    }

    // Menghapus data akun
    public function destroy($id)
    {
        $akun = User::findOrFail($id);
        $akun->delete();

        return redirect()->route('dataakun.index')->with('success', 'Data akun berhasil dihapus.');
    }

    public function exportDataAkunToExcel()
    {
        return Excel::download(new ExportDataAkun, 'dataAkun.xlsx');
    }
}
