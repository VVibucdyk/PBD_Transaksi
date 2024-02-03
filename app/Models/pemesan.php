<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemesan extends Model
{
    use HasFactory;
    protected $fillable = [
        'Kode_Pemesan',
        'Nama_Pemesan',
        'Jabatan',
        'Kode_Pelanggan',
        'Telepon',
        'Email'
    ];
    protected $table = 'pemesan';

    public function faktur()
    {
        return $this->hasMany(faktur::class, 'Kode_Pemesan', 'Kode_Pemesan');
    }
}
