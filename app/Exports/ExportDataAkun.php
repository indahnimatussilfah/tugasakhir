<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportDataAkun implements FromCollection, WithHeadings
{
    /**
     * Ambil data akun pengguna dari database.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Pilih kolom yang ingin diexport
        return User::select('name', 'email', 'role')->get();
    }

    /**
     * Tentukan header kolom pada file Excel.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Nama',
            'Email',
            'Role',
        ];
    }
}
