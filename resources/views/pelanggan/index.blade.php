@extends('layout.main')
@section('content-wrapper')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- FORM PENCARIAN & TAMBAH DATA-->
            <div class="d-flex justify-content-between mb-3 align-items-center">
                <h1 class="h3 mb-0 text-gray-800"><strong>Daftar Pelanggan</strong></h1>
                <form class="d-inline-block" action="{{ url('pelanggan') }}" method="get">
                    <div class="input-group">
                        <input class="form-control form-control-sm" type="text" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Cari pelanggan" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary btn-sm" type="submit">
                                <i class="fas fa-search"></i> <!-- FontAwesome Icon -->
                            </button>
                            <!-- TOMBOL TAMBAH DATA -->
                            <a href="{{ url('pelanggan/create') }}" class="btn btn-primary btn-sm ml-2">
                                <i class="fas fa-plus"></i> Tambah Pelanggan Baru
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- TABEL -->
            <div class="table-responsive">
                <table class="table table-striped" style="font-size: 14px"  >
                    <thead>
                        <tr>
                            <th class="">No</th>
                            {{-- <th class="">Kode Pelanggan</th> --}}
                            <th class="">Nama Pelanggan</th>
                            <th class="">Alamat</th>
                            <th class="col-md-1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstItem() ?>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            {{-- <td>{{ $item->Kode_Pelanggan }}</td> --}}
                            <td>{{ $item->Nama_Pelanggan }}</td>
                            <td>{{ $item->Alamat }}</td>
                            <td>
                                <a href='{{ url('pelanggan/'.$item->Kode_Pelanggan.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ url('pelanggan/'.$item->Kode_Pelanggan) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <?php $i++ ?> 
                        @endforeach
                    </tbody>
                </table class="table table-striped">
                {{ $data->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
