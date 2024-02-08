<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faktur extends Model
{
    use HasFactory;
    protected $fillable = [
        'Kode_Faktur',
        'No_Faktur_Pajak',
        'No_Surat_Jalan',
        'No_Surat_Pembelian',
        'Tanggal_Faktur',
        'Kode_Pemesan',
        'Subtotal',
        'DP',
        'Diskon_Harga',
        'PPN',
        'Total'
    ];
    protected $table = 'faktur';
    public $timestamps = false;

    public function pemesan()
    {
        return $this->belongsTo(pemesan::class, 'Kode_Pemesan', 'Kode_Pemesan');
    }

    public function rincian_faktur()
    {
        return $this->hasmany(rincian_faktur::class, 'Kode_Faktur', 'Kode_Faktur');
    }
}
