<?php

namespace App\Http\Controllers;

use App\Models\faktur;
use App\Models\pemesan;
use App\Models\pelanggan;
use App\Models\Rincian_Faktur;
use Illuminate\Http\Request;

class cetakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $InfoFaktur = $request->SearchFaktur;
        // $InfoFaktur = 'INV.2402.00005';
        $jumlahBaris = 8;
        if (strlen($InfoFaktur)) {
            $dataRincian = Rincian_Faktur::where('Kode_Faktur', $InfoFaktur)
                ->paginate($jumlahBaris);
            $dataFaktur = faktur::with('pemesan.pelanggan')
                ->where('Kode_Faktur', $InfoFaktur)->get();
        } else {
            $dataRincian = '';
            $dataFaktur = '';
            $dataPemesan = '';
        }

        $dataSearch = faktur::orderBy('Kode_Faktur', 'desc')->get();
        return view('cetak.index')->with('dataRincian', $dataRincian)
            ->with('dataSearch', $dataSearch)
            ->with(compact('dataFaktur'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $InfoFaktur = $request->SearchFaktur;
        // $InfoFaktur = 'INV.2402.00005';
        $jumlahBaris = 8;
        if (strlen($InfoFaktur)) {
            $dataRincian = Rincian_Faktur::where('Kode_Faktur', $InfoFaktur)
                ->paginate($jumlahBaris);
            $dataFaktur = faktur::with('pemesan.pelanggan')
                ->where('Kode_Faktur', $InfoFaktur)->get();
        } else {
            $dataRincian = '';
            $dataFaktur = '';
            $dataPemesan = '';
        }

        $dataSearch = faktur::orderBy('Kode_Faktur', 'desc')->get();
        return view('cetak.view')->with('dataRincian', $dataRincian)
            ->with('dataSearch', $dataSearch)
            ->with(compact('dataFaktur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cari = faktur::where('Kode_Faktur', $id)->first();
        if ($cari) {
            $data = $cari->Status;
        }

        // return redirect()->to('cetak')->with('success', 'Berhasil mengganti Nomor FAKTUR')->with('data', $data);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
