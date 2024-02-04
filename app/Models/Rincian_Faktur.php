<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rincian_Faktur extends Model
{
    use HasFactory;
    protected $fillable = ['Kode_Rincian',
                           'Kode_Faktur',
                           'Jumlah',
                           'Nama_Barang',
                           'Harga_Awal',
                           'Diskon',
                           'Harga_Total'];
                     
    protected $table = 'rincian_faktur';
    public $timestamps = false;
}
