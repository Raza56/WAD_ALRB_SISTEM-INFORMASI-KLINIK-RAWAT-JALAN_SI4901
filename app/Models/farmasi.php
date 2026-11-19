<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Farmasi extends Model
{
    protected $table = 'data obat';

    protected $primaryKey = 'no';

    public $timestamps = false;

    protected $fillable = [
        'kode_obat',
        'data_obat',
        'kategori',
        'sediaan',
        'pabrikan'
    ];
}