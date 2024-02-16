@extends('layout.main') {{-- Sesuaikan dengan layout yang Anda gunakan --}}

@section('content-wrapper')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- FORM PENCARIAN & TAMBAH DATA-->
            <div class="d-flex justify-content-between mb-3 align-items-center">
                <h1 class="h3 mb-0 text-gray-800"><strong>Daftar Pemesan</strong></h1>
                <form class="d-inline-block" action="{{ url('pemesan') }}" method="get">
                    <div class="input-group">
                        <input class="form-control form-control-sm" type="text" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Cari Pemesan" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary btn-sm" type="submit">
                                <i class="fas fa-search"></i> <!-- FontAwesome Icon -->
                            </button>
                            <!-- TOMBOL TAMBAH DATA -->
                            <a href="{{ url('pemesan/create') }}" class="btn btn-primary btn-sm ml-2">
                                <i class="fas fa-plus"></i> Tambah Pemesan Baru
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- TABEL -->
            <div class="table-responsive" style="font-size: 14px">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            {{-- <th>Kode Pemesan</th> --}}
                            <th>Nama Pemesan</th>
                            <th>Jabatan</th>
                            <th>Nama Pelanggan</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $pemesans->firstItem() ?>
                        @foreach ($pemesans as $pemesan)
                            <tr>
                                <td>{{ $i }}</td>
                                {{-- <td>{{ $pemesan->Kode_Pemesan }}</td> --}}
                                <td>{{ $pemesan->Nama_Pemesan }}</td>
                                <td>{{ $pemesan->Jabatan }}</td>
                                <td>{{ $pemesan->pelanggan->Nama_Pelanggan }}</td>
                                <td>{{ $pemesan->Telepon }}</td>
                                <td>{{ $pemesan->Email }}</td>
                                <td class=""> <!-- Tambahkan kelas text-right di sini juga -->
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
                        <?php $i++ ?> 
                        @endforeach
                    </tbody>
                </table>
                {{ $pemesans->links() }}
            </div>
        </div>
    </div>
</div>
@endsection