@extends('layout.main') {{-- Sesuaikan dengan layout yang Anda gunakan --}}

@section('content-wrapper')
<div class="container-fluid pt-3">
    <div class="d-flex justify-content-between mb-4 align-items-center">
        <h1 class="h3 mb-0 text-gray-800">Daftar Pemesan</h1>
        <div>
            <!-- Form Pencarian -->
            <form class="d-inline-block" action="{{ route('pemesan.index') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control form-control-sm" name="search" placeholder="Cari Pemesan" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary btn-sm" type="submit">
                            <i class="fas fa-search"></i> <!-- FontAwesome Icon -->
                        </button>
                    </div>
                </div>
            </form>
            <!-- Tombol Tambah Pemesan Baru -->
            <a href="{{ route('pemesan.create') }}" class="btn btn-primary btn-sm ml-2">
                <i class="fas fa-plus"></i> Tambah Pemesan Baru
            </a>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Kode Pemesan</th>
                <th>Nama Pemesan</th>
                <th>Jabatan</th>
                <th>Kode Pelanggan</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pemesans as $pemesan)
                <tr>
                    <td>{{ $pemesan->Kode_Pemesan }}</td>
                    <td>{{ $pemesan->Nama_Pemesan }}</td>
                    <td>{{ $pemesan->Jabatan }}</td>
                    <td>{{ $pemesan->Kode_Pelanggan }}</td>
                    <td>{{ $pemesan->Telepon }}</td>
                    <td>{{ $pemesan->Email }}</td>
                    <td class="text-right"> <!-- Tambahkan kelas text-right di sini juga -->
                        <a href="{{ route('pemesan.show', $pemesan->Kode_Pemesan) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                        <a href="{{ route('pemesan.edit', $pemesan->Kode_Pemesan) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('pemesan.destroy', $pemesan->Kode_Pemesan) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $pemesans->links() }}
</div>
@endsection