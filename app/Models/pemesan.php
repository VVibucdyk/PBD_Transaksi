<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesan extends Model
{
    protected $table = 'pemesan';
    protected $primaryKey = 'Kode_Pemesan';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'Nama_Pemesan',
        'Jabatan',
        'Kode_Pelanggan',
        'Telepon',
        'Email'
    ];
}
