<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poliklinik extends Model
{
    protected $table = 'polikliniks';

    protected $fillable = [
        'nama_poli',
        'lokasi_gedung',
        'nomor_ruangan',
        'inventaris'
    ];
}