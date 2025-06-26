<?php

namespace App\Imports;

use App\Models\DataPenyakit;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class ImportDataPenyakit implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new DataPenyakit([
            'tanggal'        => Carbon::parse($row['tanggal'])->format('Y-m-d'),
            'nama_penyakit'  => $row['nama_penyakit'],
            'jumlah'         => $row['jumlah'],
            'laki_laki'      => $row['laki_laki'],
            'perempuan'      => $row['perempuan'],
            'anak'           => $row['anak'],
            'dewasa'         => $row['dewasa'],
            'lansia'         => $row['lansia'],
            'nama_puskesmas' => $row['nama_puskesmas'],
            'kecamatan'      => $row['kecamatan'],
        ]);
    }
}
