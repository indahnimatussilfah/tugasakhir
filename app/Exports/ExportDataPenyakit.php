<?php

namespace App\Exports;

use App\Models\DataPenyakit;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportDataPenyakit implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection 
     */
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

        $no = 1;
        $data = [];


        foreach ($dataPenyakit as $item) {
            $data[] = [
                $no++, 
                $item->tanggal,
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
        ];
    } 
}
