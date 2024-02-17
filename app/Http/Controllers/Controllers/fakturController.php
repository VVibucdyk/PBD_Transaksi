<?php

namespace App\Http\Controllers;

use App\Models\faktur;
use App\Models\pelanggan;
use App\Models\pemesan;
use App\Models\Rincian_Faktur;
use Illuminate\Http\Request;
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
            $data = faktur::orderBy('Kode_Faktur', 'desc')
                ->paginate($jumlahbaris);
        }
        return view('faktur.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Membuat Variabel 2digit dari tahun dan bulan sekarang
        $tahunSekarang = substr(now()->year, -2);
        $bulanSekarang = str_pad(now()->month, 2, '0', STR_PAD_LEFT);

        // Mengambil data dari urutan terakhir berdasarkan 'Kode Faktur'
        $latestData = faktur::orderBy('Kode_Faktur', 'desc')->first();
        $arrayLatest = json_decode($latestData, true);

        // Mengambil kode dari masing2 kolom
        $KodeFakturLatest = $arrayLatest['Kode_Faktur'];
        $kode1 = substr($KodeFakturLatest, 9);
        $FakturPajakLatest = $arrayLatest['No_Faktur_Pajak'];
        $kode2 = substr($FakturPajakLatest, 11);
        $SuratJalanLatest = $arrayLatest['No_Surat_Jalan'];
        $kode3 = substr($SuratJalanLatest, 8);
        $SuratPembelianLatest = $arrayLatest['No_Surat_Pembelian'];
        $kode4 = substr($SuratPembelianLatest, 8);

        // Auto Increment Kode apabila tahun data terakhir adalah sama
        $tahunFaktur = substr($KodeFakturLatest, 4, 2);
        if ($tahunFaktur == $tahunSekarang) {
            $kode1 = str_pad(($kode1 + 1), 5, '0', STR_PAD_LEFT);
            $KodeFaktur = substr($KodeFakturLatest, 0, 9) . $kode1;
            $kode2 = str_pad(($kode2 + 1), 8, '0', STR_PAD_LEFT);
            $FakturPajak = substr($FakturPajakLatest, 0, 11) . $kode2;
            $kode3 = str_pad(($kode3 + 1), 5, '0', STR_PAD_LEFT);
            $SuratJalan = substr($SuratJalanLatest, 0, 8) . $kode3;
            $kode4 = str_pad(($kode4 + 1), 5, '0', STR_PAD_LEFT);
            $SuratPembelian = substr($SuratPembelianLatest, 0, 8) . $kode4;
        } else {
            $KodeFaktur = 'INV.' . $tahunSekarang . $bulanSekarang . '.' . '00001';
            $FakturPajak = '010.001.' . $tahunSekarang . '.00000001';
            $SuratJalan = 'DO.' . $tahunSekarang . $bulanSekarang . '.' . '00001';
            $SuratPembelian = 'SO.' . $tahunSekarang . $bulanSekarang . '.' . '00001';
        }

        $data = pemesan::with('pelanggan')
            ->orderBy('Kode_Pelanggan', 'asc')
            ->get();

        return view('faktur.create', compact('data'))
            ->with('KodeFaktur', $KodeFaktur)
            ->with('FakturPajak', $FakturPajak)
            ->with('SuratJalan', $SuratJalan)
            ->with('SuratPembelian', $SuratPembelian);
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
            'Kode_Pemesan.required' => 'Nama_Pemesan wajib diisi',
            'Kode_Faktur.unique' => 'Kode_Faktur yang diisikan sudah ada dalam database'
        ]);
        $data = [
            'Kode_Faktur' => $request->Kode_Faktur,
            'No_Faktur_Pajak' => $request->No_Faktur_Pajak,
            'No_Surat_Jalan' => $request->No_Surat_Jalan,
            'No_Surat_Pembelian' => $request->No_Surat_Pembelian,
            'Tanggal_Faktur' => $request->Tanggal_Faktur,
            'Kode_Pemesan' => $request->Kode_Pemesan,
            'Subtotal' => 0,
            'DP' => $request->DP,
            'Diskon_Harga' => $request->Diskon_Harga,
            'PPN' => 0,
            'Total' => 0,
            'Status' => 'Open'
        ];
        faktur::create($data);
        return redirect()->to('faktur')->with('success', 'Faktur berhasil ditambahkan');
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
        // $request->validate([
        //     'No_Faktur_Pajak' => 'required:faktur,No_Faktur_Pajak',
        //     'No_Surat_Jalan' => 'required:faktur,No_Surat_Jalan',
        //     'No_Surat_Pembelian' => 'required:faktur,No_Surat_Pembelian',
        //     'Tanggal_Faktur' => 'required:faktur,Tanggal_Faktur',
        //     'Kode_Pemesan' => 'required:faktur,Kode_Pemesan',
        // ], [
        //     'No_Faktur_Pajak.required' => 'No_Faktur_Pajak wajib diisi',
        //     'No_Surat_Jalan.required' => 'No_Surat_Jalan wajib diisi',
        //     'No_Surat_Pembelian.required' => 'No_Surat_Pembelian wajib diisi',
        //     'Tanggal_Faktur.required' => 'Tanggal_Faktur wajib diisi',
        //     'Kode_Pemesan.required' => 'Kode_Pemesan wajib diisi',
        // ]);

        $cari = faktur::where('Kode_Faktur', $id)->first();
        if ($cari) {
            $status = $cari->Status;
        }

        if ($status == 'Open') {
            $statusChange = 'Void';
        } else {
            $statusChange = 'Open';
        }

        $data = [
            // 'Kode_Faktur' => $request->Kode_Faktur,
            // 'No_Faktur_Pajak' => $request->No_Faktur_Pajak,
            // 'No_Surat_Jalan' => $request->No_Surat_Jalan,
            // 'No_Surat_Pembelian' => $request->No_Surat_Pembelian,
            // 'Tanggal_Faktur' => $request->Tanggal_Faktur,
            // 'Kode_Pemesan' => $request->Kode_Pemesan,
            // 'Subtotal' => $request->Subtotal,
            // 'DP' => $request->DP,
            // 'Diskon_Harga' => $request->Diskon_Harga,
            // 'PPN' => $request->PPN,
            // 'Total' => $request->Total,
            'Status' => $statusChange
        ];
        faktur::where('Kode_Faktur', $id)->update($data);
        return redirect()->to('faktur')->with('success', 'Berhasil mengganti status FAKTUR dari ' . $status . ' menjadi ' . $statusChange);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Rincian_Faktur::where('Kode_Faktur', $id)->exists()) {
            return redirect()->to('faktur')->with('error', 'Faktur ' . $id . ' tidak bisa dihapus karena ada dalam Daftar Rincian Faktur.');
        } else {
            faktur::where('Kode_Faktur', $id)->delete();
            return redirect()->to('faktur')->with('success', 'Faktur ' . $id . ' Berhasil dihapus');
        }
    }
}
