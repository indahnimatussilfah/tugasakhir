<?php

namespace App\Exports;

use App\Models\DataPenyakit;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class ExportLaporanDinas implements FromView
{
    protected $bulan;

    public function __construct($bulan)
    {
        $this->bulan = $bulan;
    }

    public function view(): View
    {
        $query = DataPenyakit::query();

        if ($this->bulan) {
            $query->whereYear('tanggal', date('Y', strtotime($this->bulan)))
                  ->whereMonth('tanggal', date('m', strtotime($this->bulan)));
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

        return view('petugaskesehatan.laporandinas.export', [
            'rekap' => $rekap
        ]);
    }
}
