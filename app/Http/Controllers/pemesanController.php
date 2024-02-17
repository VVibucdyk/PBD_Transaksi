<?php

namespace App\Http\Controllers;

use App\Models\faktur;
use App\Models\Pemesan;
use App\Models\pelanggan;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PemesanController extends Controller
{
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 8;
        if ($katakunci) {
            $pemesans = Pemesan::with('pelanggan')
                ->where('Nama_Pemesan', 'like', '%' . $katakunci . '%')
                ->orWhere('Kode_Pemesan', 'like', '%' . $katakunci . '%')
                ->orWhereHas('pelanggan', function ($query) use ($katakunci) {
                    $query->where('Nama_Pelanggan', 'like', "%$katakunci%");
                }) // search tabel yang lain
                ->paginate($jumlahbaris);
        } else {
            $pemesans = Pemesan::orderBy('Kode_Pemesan', 'desc')
                ->paginate($jumlahbaris);
        }

        return view('pemesan.index', compact('pemesans'));
    }

    public function create()
    {
        return view('pemesan.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Nama_Pemesan' => 'required|max:255',
            'Jabatan' => 'required|max:255',
            'Kode_Pelanggan' => 'required|integer',
            'Telepon' => 'nullable|max:50',
            'Email' => 'nullable|email|max:255',
        ]);

        Pemesan::create($validatedData);
        return redirect()->route('pemesan.index')->with('success', 'Pemesan baru berhasil ditambahkan.');
    }

    public function show(Pemesan $pemesan)
    {
        return view('pemesan.show', compact('pemesan'));
    }

    public function edit(Pemesan $pemesan)
    {
        return view('pemesan.edit', compact('pemesan'));
    }

    public function update(Request $request, Pemesan $pemesan)
    {
        $validatedData = $request->validate([
            'Nama_Pemesan' => 'required|max:255',
            'Jabatan' => 'required|max:255',
            'Kode_Pelanggan' => 'required|integer',
            'Telepon' => 'nullable|max:50',
            'Email' => 'nullable|email|max:255',
        ]);

        $pemesan->update($validatedData);
        return redirect()->route('pemesan.index')->with('success', 'Pemesan berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        // Periksa apakah ada faktur yang menggunakan id_pemesan yang ingin dihapus
        if (faktur::where('Kode_Pemesan', $id)->exists()) {
            return redirect()->route('pemesan.index')->with('error', 'Pemesan tidak bisa dihapus karena ada dalam data faktur.');
        } else {
            Pemesan::where('Kode_Pemesan', $id)->delete();
            return redirect()->route('pemesan.index')->with('success', 'Pemesan berhasil dihapus.');
        }
    }
}
