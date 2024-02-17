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

        return view('dashboard')->with('countFaktur', $countFaktur)
            ->with('countRincian', $countRincian)
            ->with('countPemesan', $countPemesan)
            ->with('countPelanggan', $countPelanggan);
        // return $countFaktur;
    }
}
