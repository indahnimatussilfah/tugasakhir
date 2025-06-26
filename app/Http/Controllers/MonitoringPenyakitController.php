<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPenyakit;
use App\Exports\ExportDataPenyakit;
use Maatwebsite\Excel\Facades\Excel;

class MonitoringPenyakitController extends Controller
{
    // Tampil halaman awal + filter
    public function index(Request $request)
    {
        $query = DataPenyakit::query();

        if ($request->filled('nama_penyakit')) {
            $query->where('nama_penyakit', 'like', '%' . $request->nama_penyakit . '%');
        }

        if ($request->filled('nama_puskesmas')) {
            $query->where('nama_puskesmas', 'like', '%' . $request->nama_puskesmas . '%');
        }

        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        $dataPenyakit = $query->orderBy('tanggal', 'desc')->get();

        return view('admin.monitoringpenyakit.monitoringpenyakit', compact('dataPenyakit'));
    }

    // Export semua data ke Excel
    public function exportAll()
    {
        return Excel::download(new ExportDataPenyakit, 'Monitoring-Penyakit.xlsx');
    }

    // AJAX filter data (opsional, bisa dipakai untuk kebutuhan AJAX)
    public function ajaxSearch(Request $request)
    {
        $query = DataPenyakit::query();

        if ($request->filled('nama_penyakit')) {
            $query->where('nama_penyakit', 'like', '%' . $request->nama_penyakit . '%');
        }

        if ($request->filled('nama_puskesmas')) {
            $query->where('nama_puskesmas', 'like', '%' . $request->nama_puskesmas . '%');
        }

        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        return response()->json($query->get());
    }
}
