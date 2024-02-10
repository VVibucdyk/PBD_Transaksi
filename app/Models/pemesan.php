<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesan extends Model
{
    use HasFactory;
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

    public function faktur()
    {
        return $this->hasMany(faktur::class, 'Kode_Pemesan', 'Kode_Pemesan');
    }

    public function pelanggan()
    {
        return $this->belongsTo(pelanggan::class, 'Kode_Pelanggan', 'Kode_Pelanggan');
    }
}
