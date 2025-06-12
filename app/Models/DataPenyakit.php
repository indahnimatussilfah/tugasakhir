<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenyakit extends Model
{
    use HasFactory;

    protected $table = 'data_penyakit'; // Nama tabel di database

    protected $fillable = [
        'tanggal',
        'nama_penyakit',
        'jumlah',
        'laki_laki',
        'perempuan',
        'bayi',
        'balita',
        'anak',
        'remaja',
        'dewasa',
        'lansia',
        'nama_puskesmas',
        'kecamatan',
    ];
}

