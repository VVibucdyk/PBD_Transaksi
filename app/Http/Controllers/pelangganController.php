<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class pelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 8;
        if (strlen($katakunci)) {
            $data = pelanggan::with('pemesan')
                ->where('Nama_Pelanggan', 'like', "%$katakunci%")
                ->orWhere('Alamat', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = pelanggan::orderBy('Kode_Pelanggan', 'desc')
                ->paginate($jumlahbaris);
        }
        return view('pelanggan.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('Nama_Pelanggan', $request->Nama_Pelanggan);
        Session::flash('Alamat', $request->Alamat);

        $request->validate([
            'Nama_Pelanggan' => 'required:pelanggan,Nama_Pelanggan',
            'Alamat' => 'required:pelanggan,Alamat'
        ], [
            'Nama_Pelanggan.required' => 'Nama_Pelanggan wajib diisi',
            'Alamat.required' => 'Alamat wajib diisi'
        ]);

        $data = [
            'Kode_Pelanggan' => $request->Kode_Pelanggan,
            'Nama_Pelanggan' => $request->Nama_Pelanggan,
            'Alamat' => $request->Alamat,
        ];

        pelanggan::create($data);
        return redirect()->to('pelanggan')->with('success', 'Berhasil menambahkan data');
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
        $data = pelanggan::where('Kode_Pelanggan', $id)->first();
        return view('pelanggan.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'Nama_Pelanggan' => 'required:pelanggan,Nama_Pelanggan',
            'Alamat' => 'required:pelanggan,Alamat'
        ], [
            'Nama_Pelanggan.required' => 'Nama_Pelanggan wajib diisi',
            'Alamat.required' => 'Alamat wajib diisi'
        ]);

        $data = [
            'Kode_Pelanggan' => $request->Kode_Pelanggan,
            'Nama_Pelanggan' => $request->Nama_Pelanggan,
            'Alamat' => $request->Alamat,
        ];

        pelanggan::where('Kode_Pelanggan', $id)->update($data);
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        pelanggan::where('Kode_Pelanggan', $id)->delete();
        return redirect()->to('pelanggan')->with('success', 'Berhasil delete data');
    }
}
