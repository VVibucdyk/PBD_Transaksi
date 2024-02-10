<?php

namespace App\Http\Controllers;

use App\Models\Pemesan;
use Illuminate\Http\Request;

class PemesanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $pemesans = Pemesan::where('Nama_Pemesan', 'like', '%' . $search . '%')
                ->orWhere('Kode_Pemesan', 'like', '%' . $search . '%')
                // Tambahkan kondisi pencarian untuk kolom lain yang diinginkan
                ->paginate(10);
        } else {
            $pemesans = Pemesan::paginate(10);
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

    public function destroy(Pemesan $pemesan)
    {
        $pemesan->delete();
        return redirect()->route('pemesan.index')->with('success', 'Pemesan berhasil dihapus.');
    }
}
