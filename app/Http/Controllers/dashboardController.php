<?php

namespace App\Http\Controllers;

use App\Models\faktur;
use App\Models\pelanggan;
use App\Models\Pemesan;
use App\Models\Rincian_Faktur;

class dashboardController extends Controller
{
    public function view()
    {
        $countFaktur = faktur::count();
        $countRincian = Rincian_Faktur::count();
        $countPemesan = Pemesan::count();
        $countPelanggan = pelanggan::count();
        $fakturTermahal = faktur::with('pemesan.pelanggan')
            ->orderBy('Total', 'desc')->first();
        $totalPerTahun = faktur::selectRaw('YEAR(Tanggal_Faktur) as tahun, MONTH(Tanggal_Faktur) as bulan, SUM(Total) as total')
            ->orderBy(faktur::raw('YEAR(Tanggal_Faktur)'), 'desc')
            ->orderBy(faktur::raw('MONTH(Tanggal_Faktur)'), 'desc')
            ->groupBy(faktur::raw('YEAR(Tanggal_Faktur), MONTH(Tanggal_Faktur)'))
            ->get();

        return view('dashboard')->with('countFaktur', $countFaktur)
            ->with('countRincian', $countRincian)
            ->with('countPemesan', $countPemesan)
            ->with('countPelanggan', $countPelanggan)
            ->with(compact('fakturTermahal'))
            ->with(compact('totalPerTahun'));
        // return $totalPerTahun;
    }
}
