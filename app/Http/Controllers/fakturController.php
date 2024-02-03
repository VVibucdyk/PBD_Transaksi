<?php

namespace App\Http\Controllers;

use App\Models\faktur;
use App\Models\pemesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session as FacadesSession;

class fakturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 8;
        if (strlen($katakunci)) {
            $data = faktur::with('pemesan')
                ->where('Kode_Faktur', 'like', "%$katakunci%")
                ->orWhere('No_Faktur_Pajak', 'like', "%$katakunci%")
                ->orWhere('No_Surat_Jalan', 'like', "%$katakunci%")
                ->orWhere('No_Surat_Pembelian', 'like', "%$katakunci%")
                ->orWhere('Tanggal_Faktur', 'like', "%$katakunci%")
                ->orWhereHas('pemesan', function ($query) use ($katakunci) {
                    $query->where('Nama_Pemesan', 'like', "%$katakunci%");
                }) // search tabel yang lain
                ->paginate($jumlahbaris);
        } else {
            // $data = faktur::orderBy('Kode_Faktur', 'desc')->paginate($jumlahbaris);
            $data = faktur::with('pemesan')->orderBy('Kode_Faktur', 'desc')
                ->paginate($jumlahbaris);
        }
        // return view('faktur.index')->with('data', $data);
        return view('faktur.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data2 = pemesan::all();
        return view('faktur.create')->with('data2', $data2);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        FacadesSession::flash('Kode_Faktur', $request->Kode_Faktur);
        FacadesSession::flash('No_Faktur_Pajak', $request->No_Faktur_Pajak);
        FacadesSession::flash('No_Surat_Jalan', $request->No_Surat_Jalan);
        FacadesSession::flash('No_Surat_Pembelian', $request->No_Surat_Pembelian);
        FacadesSession::flash('Tanggal_Faktur', $request->Tanggal_Faktur);
        FacadesSession::flash('Kode_Pemesan', $request->Kode_Pemesan);
        FacadesSession::flash('Subtotal', $request->Subtotal);
        FacadesSession::flash('DP', $request->DP);
        FacadesSession::flash('Diskon_Harga', $request->Diskon_Harga);
        FacadesSession::flash('PPN', $request->PPN);
        FacadesSession::flash('Total', $request->Total);

        $request->validate([
            'Kode_Faktur' => 'required:faktur,Kode_Faktur',
            'No_Faktur_Pajak' => 'required:faktur,No_Faktur_Pajak',
            'No_Surat_Jalan' => 'required:faktur,No_Surat_Jalan',
            'No_Surat_Pembelian' => 'required:faktur,No_Surat_Pembelian',
            'Tanggal_Faktur' => 'required:faktur,Tanggal_Faktur',
            'Kode_Pemesan' => 'required:faktur,Kode_Pemesan',
        ], [
            'Kode_Faktur.required' => 'Kode_Faktur wajib diisi',
            'No_Faktur_Pajak.required' => 'No_Faktur_Pajak wajib diisi',
            'No_Surat_Jalan.required' => 'No_Surat_Jalan wajib diisi',
            'No_Surat_Pembelian.required' => 'No_Surat_Pembelian wajib diisi',
            'Tanggal_Faktur.required' => 'Tanggal_Faktur wajib diisi',
            'Kode_Pemesan.required' => 'Kode_Pemesan wajib diisi',
            'Kode_Faktur.unique' => 'Kode_Faktur yang diisikan sudah ada dalam database'
        ]);
        $data = [
            'Kode_Faktur' => $request->Kode_Faktur,
            'No_Faktur_Pajak' => $request->No_Faktur_Pajak,
            'No_Surat_Jalan' => $request->No_Surat_Jalan,
            'No_Surat_Pembelian' => $request->No_Surat_Pembelian,
            'Tanggal_Faktur' => $request->Tanggal_Faktur,
            'Kode_Pemesan' => $request->Kode_Pemesan,
            'Subtotal' => $request->Subtotal,
            'DP' => $request->DP,
            'Diskon_Harga' => $request->Diskon_Harga,
            'PPN' => $request->PPN,
            'Total' => $request->Total,
        ];
        faktur::create($data);
        return redirect()->to('faktur')->with('success', 'Berhasil menambahkan data');
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
        $data = faktur::where('Kode_Faktur', $id)->first();
        $data2 = pemesan::all();
        return view('faktur.edit')->with('data', $data)
            ->with('data2', $data2);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'No_Faktur_Pajak' => 'required:faktur,No_Faktur_Pajak',
            'No_Surat_Jalan' => 'required:faktur,No_Surat_Jalan',
            'No_Surat_Pembelian' => 'required:faktur,No_Surat_Pembelian',
            'Tanggal_Faktur' => 'required:faktur,Tanggal_Faktur',
            'Kode_Pemesan' => 'required:faktur,Kode_Pemesan',
        ], [
            'No_Faktur_Pajak.required' => 'No_Faktur_Pajak wajib diisi',
            'No_Surat_Jalan.required' => 'No_Surat_Jalan wajib diisi',
            'No_Surat_Pembelian.required' => 'No_Surat_Pembelian wajib diisi',
            'Tanggal_Faktur.required' => 'Tanggal_Faktur wajib diisi',
            'Kode_Pemesan.required' => 'Kode_Pemesan wajib diisi',
        ]);
        $data = [
            'Kode_Faktur' => $request->Kode_Faktur,
            'No_Faktur_Pajak' => $request->No_Faktur_Pajak,
            'No_Surat_Jalan' => $request->No_Surat_Jalan,
            'No_Surat_Pembelian' => $request->No_Surat_Pembelian,
            'Tanggal_Faktur' => $request->Tanggal_Faktur,
            'Kode_Pemesan' => $request->Kode_Pemesan,
            'Subtotal' => $request->Subtotal,
            'DP' => $request->DP,
            'Diskon_Harga' => $request->Diskon_Harga,
            'PPN' => $request->PPN,
            'Total' => $request->Total,
        ];
        faktur::where('Kode_Faktur', $id)->update($data);
        return redirect()->to('faktur')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        faktur::where('Kode_Faktur', $id)->delete();
        return redirect()->to('faktur')->with('success', 'Berhasil delete data');
    }
}
