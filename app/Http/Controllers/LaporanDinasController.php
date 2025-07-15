<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPenyakit;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportLaporanDinas;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Illuminate\Support\Facades\DB;


class LaporanDinasController extends Controller
{
    public function index(Request $request)
    {
        $query = DataPenyakit::query();

        if ($request->has('bulan') && $request->bulan != '') {
            $bulan = $request->bulan;
            $query->whereYear('tanggal', date('Y', strtotime($bulan)))
                  ->whereMonth('tanggal', date('m', strtotime($bulan)));
        }

        $rekap = $query->select(
            'nama_penyakit',
            DB::raw('SUM(jumlah) as total_kasus'),
            DB::raw('SUM(laki_laki) as laki_laki'),
            DB::raw('SUM(perempuan) as perempuan'),
            DB::raw('SUM(bayi) as bayi'),
            DB::raw('SUM(balita) as balita'),
            DB::raw('SUM(anak) as anak'),
            DB::raw('SUM(remaja) as remaja'),
            DB::raw('SUM(dewasa) as dewasa'),
            DB::raw('SUM(lansia) as lansia')
        )
        ->groupBy('nama_penyakit')
        ->orderByDesc('total_kasus')
        ->get();

        return view('petugaskesehatan.laporandinas.index', compact('rekap'));
    }

    public function export(Request $request)
{
    return Excel::download(new ExportLaporanDinas($request->bulan, true), 'Laporan_Agregat_Dinas.xlsx');
}

}
