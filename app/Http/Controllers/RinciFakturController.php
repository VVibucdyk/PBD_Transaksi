<?php

namespace App\Http\Controllers;

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
        $jumlahBaris = 2;
        if(strlen($kataKunci)){
            $data=rincian_faktur::where('Kode_Rincian','like',"%$kataKunci%")
                    ->orWhere('Kode_Faktur','like',"%$kataKunci%")
                    ->orWhere('Nama_Barang','like',"%$kataKunci%")
                    ->paginate($jumlahBaris);
        }else{
            $data = rincian_faktur::orderBy('Kode_Rincian','asc')->paginate($jumlahBaris);
        }
        return view('rincian.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rincian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('Kode_Rincian',$request->kode_rincian);
        Session::flash('Kode_Faktur',$request->kode_faktur);

        $request->validate([
            'kode_rincian'=>'required|unique:rincian_faktur,Kode_Rincian',
            'kode_faktur'=>'required|unique:rincian_faktur,Kode_Faktur',
            'jumlah'=>'required|numeric',
            'nama_barang'=>'required',
            'harga_awal'=>'required|numeric',
            'diskon'=>'required|numeric',
            'harga_total'=>'required|numeric'

        ], [
            'kode_rincian.required'=>'Kode Rincian Wajib Disi',
            'kode_rincian.unique'=>'Kode Rincian Sudah Tersedia di Database',
            'kode_faktur.required'=>'Kode Faktur Wajib Disi',
            'kode_faktur.unique'=>'Kode Faktur Sudah Tersedia di Database',
            'jumlah.required'=>'Jumlah Harus Diisi',
            'jumlah.numeric'=>'Jumlah Harus Diisi Dengan Angka',
            'nama_barang.required'=>'Nama Barang Harus Diisi',
            'harga_awal.required'=>'Harga Awal Harus Diisi',
            'harga_awal.numeric'=>'Harga Awal Harus Diisi Dengan Angka',
            'diskon.required'=>'Diskon Harus Diisi',
            'diskon.numeric'=>'Diskon Harus Diisi Dengan Angka',
            'harga_total.required'=>'Harga Total Harus Diisi',
            'harga_total.numeric'=>'Harga Total Harus Diisi Dengan Angka'
        ]);
        $data = [
            'Kode_Rincian'=>$request->kode_rincian,
            'Kode_Faktur'=>$request->kode_faktur,
            'Jumlah'=>$request->jumlah,
            'Nama_Barang'=>$request->nama_barang,
            'Harga_Awal'=>$request->harga_awal,
            'Diskon'=>$request->diskon,
            'Harga_Total'=>$request->harga_total
        ];
        Rincian_Faktur::create($data);
        return redirect()->to('/rincian')->with('success','Berhasil Menambahkan Data');
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
        $data = rincian_faktur::where('Kode_Rincian',$id)->first();
        return view('rincian.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $request->validate([
            'jumlah'=>'required|numeric',
            'nama_barang'=>'required',
            'harga_awal'=>'required|numeric',
            'diskon'=>'required|numeric',
            'harga_total'=>'required|numeric'

        ], [
            'jumlah.required'=>'Jumlah Harus Diisi',
            'jumlah.numeric'=>'Jumlah Harus Diisi Dengan Angka',
            'nama_barang.required'=>'Nama Barang Harus Diisi',
            'harga_awal.required'=>'Harga Awal Harus Diisi',
            'harga_awal.numeric'=>'Harga Awal Harus Diisi Dengan Angka',
            'diskon.required'=>'Diskon Harus Diisi',
            'diskon.numeric'=>'Diskon Harus Diisi Dengan Angka',
            'harga_total.required'=>'Harga Total Harus Diisi',
            'harga_total.numeric'=>'Harga Total Harus Diisi Dengan Angka'
        ]);
        $data = [
            'Jumlah'=>$request->jumlah,
            'Nama_Barang'=>$request->nama_barang,
            'Harga_Awal'=>$request->harga_awal,
            'Diskon'=>$request->diskon,
            'Harga_Total'=>$request->harga_total
        ];
        Rincian_Faktur::where('Kode_Rincian',$id)->update($data);
        return redirect()->to('/rincian')->with('success','Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        rincian_faktur::where('Kode_Rincian',$id)->delete();
        return redirect()->to('rincian')->with('success','Berhasil Melakukan Hapus Data'); 
    }
}
