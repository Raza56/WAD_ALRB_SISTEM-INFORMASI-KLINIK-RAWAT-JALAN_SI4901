<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'tb_pasien';

    protected $primaryKey = 'id_pasien';

    protected $fillable = ['no_rm', 'nama', 'domisili', 'kontak'];

    public $timestamps = false; 
}