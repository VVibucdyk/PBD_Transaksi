<?php

namespace App\Http\Controllers;

use App\Models\faktur;
use App\Models\Rincian_Faktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RinciFakturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kataKunci = $request->katakunci;
        $jumlahBaris = 8;
        if (strlen($kataKunci)) {
            $data = rincian_faktur::where('Kode_Rincian', 'like', "%$kataKunci%")
                ->orWhere('Kode_Faktur', 'like', "%$kataKunci%")
                ->orWhere('Nama_Barang', 'like', "%$kataKunci%")
                ->paginate($jumlahBaris);
        } else {
            $data = rincian_faktur::orderBy('Kode_Rincian', 'desc')->paginate($jumlahBaris);
        }
        return view('rincian.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $data = Rincian_Faktur::with('faktur')
        //         -> orderby('Kode_Faktur','asc')
        //         -> get();
        // return view('rincian.create',compact('data'));
        $data = faktur::orderBy('Kode_Faktur', 'desc')->get();
        return view('rincian.create')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('Kode_Rincian', $request->kode_rincian);
        Session::flash('Kode_Faktur', $request->kode_faktur);

        $request->validate([
            'jumlah' => 'required|numeric',
            'nama_barang' => 'required',
            'harga_awal' => 'required|numeric',
            'diskon' => 'required|numeric',

        ], [
            'jumlah.required' => 'Jumlah Harus Diisi',
            'jumlah.numeric' => 'Jumlah Harus Diisi Dengan Angka',
            'nama_barang.required' => 'Nama Barang Harus Diisi',
            'harga_awal.required' => 'Harga Awal Harus Diisi',
            'harga_awal.numeric' => 'Harga Awal Harus Diisi Dengan Angka',
            'diskon.required' => 'Diskon Harus Diisi',
            'diskon.numeric' => 'Diskon Harus Diisi Dengan Angka',
        ]);
        $harga_diskon = $request->harga_awal - ($request->harga_awal * ($request->diskon / 100));
        $data = [
            'Kode_Faktur' => $request->kode_faktur,
            'Jumlah' => $request->jumlah,
            'Nama_Barang' => $request->nama_barang,
            'Harga_Awal' => $request->harga_awal,
            'Diskon' => $request->diskon,
            'Harga_Total' => $harga_diskon * $request->jumlah
        ];
        Rincian_Faktur::create($data);
        return redirect()->to('/rincian')->with('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = rincian_faktur::where('Kode_Rincian', $id)->first();

        $data2 = faktur::all();
        return view('rincian.edit')->with('data', $data)
            ->with('data2', $data2);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jumlah' => 'required|numeric',
            'nama_barang' => 'required',
            'harga_awal' => 'required|numeric',
            'diskon' => 'required|numeric',
        ], [
            'jumlah.required' => 'Jumlah Harus Diisi',
            'jumlah.numeric' => 'Jumlah Harus Diisi Dengan Angka',
            'nama_barang.required' => 'Nama Barang Harus Diisi',
            'harga_awal.required' => 'Harga Awal Harus Diisi',
            'harga_awal.numeric' => 'Harga Awal Harus Diisi Dengan Angka',
            'diskon.required' => 'Diskon Harus Diisi',
            'diskon.numeric' => 'Diskon Harus Diisi Dengan Angka',
        ]);
        $harga_diskon = $request->harga_awal - ($request->harga_awal * ($request->diskon / 100));
        $data = [
            'Kode_Faktur' => $request->kode_faktur,
            'Jumlah' => $request->jumlah,
            'Nama_Barang' => $request->nama_barang,
            'Harga_Awal' => $request->harga_awal,
            'Diskon' => $request->diskon,
            'Harga_Total' => $harga_diskon * $request->jumlah
        ];
        Rincian_Faktur::where('Kode_Rincian', $id)->update($data);
        return redirect()->to('/rincian')->with('success', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        rincian_faktur::where('Kode_Rincian', $id)->delete();
        return redirect()->to('rincian')->with('success', 'Berhasil Melakukan Hapus Data');
    }
}
