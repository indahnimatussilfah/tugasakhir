<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataArtikel extends Model
{
    use HasFactory;

    protected $table = 'DataArtikel'; // Nama tabel persis

    protected $fillable = [
        'judul',
        'isi',
        'penulis',
        'tanggal',
        'foto',
    ];
}
