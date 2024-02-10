<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelanggan extends Model
{
    use HasFactory;
    protected $fillable = [
        'Kode_Pelanggan',
        'Nama_Pelanggan',
        'Alamat',
    ];
    protected $table = 'pelanggan';
    public $timestamps = false;

    public function pemesan()
    {
        return $this->hasMany(pemesan::class, 'Kode_Pelanggan', 'Kode_Pelanggan');
    }
}
