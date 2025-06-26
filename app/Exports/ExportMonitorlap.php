<?php

namespace App\Exports;

use App\Models\DataPenyakit;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;

class ExportMonitorlap implements FromCollection, WithHeadings
{
    public function collection()
    {
        $dataPenyakit = DataPenyakit::select([
            'tanggal',
            'nama_penyakit',
            'jumlah',
            'laki_laki',
            'perempuan',
            'anak',
            'dewasa',
            'lansia',
            'nama_puskesmas',
            'kecamatan'
        ])->get();

        $data = [];

        foreach ($dataPenyakit as $item) {
            $data[] = [
                $item->tanggal ? Carbon::parse($item->tanggal)->format('d-m-Y') : '',
                $item->nama_penyakit,
                $item->jumlah,
                $item->laki_laki,
                $item->perempuan,
                $item->anak,
                $item->dewasa,
                $item->lansia,
                $item->nama_puskesmas,
                $item->kecamatan,
            ];
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Nama Penyakit',
            'Jumlah',
            'Laki-laki',
            'Perempuan',
            'Anak',
            'Dewasa',
            'Lansia',
            'Nama Puskesmas',
            'Kecamatan'
        ];
    }
}
