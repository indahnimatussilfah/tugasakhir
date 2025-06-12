<?php

// app/Models/DataAkun.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataAkun extends Model
{
    protected $table = 'dataakun';

    protected $fillable = [
        'nama', 'email', 'role', 'tanggal_dibuat'
    ];

    protected $casts = [
        'tanggal_dibuat' => 'date',
    ];
}
