@extends('layout.main')
@section('content-wrapper')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- FORM PENCARIAN & TAMBAH DATA-->
            <div class="d-flex justify-content-between mb-3 align-items-center">
                <h1 class="h3 mb-0 text-gray-800"><strong>Daftar Rincian Faktur</strong></h1>
                <form class="d-inline-block" action="{{ url('rincian') }}" method="get">
                    <div class="input-group">
                        <input class="form-control form-control-sm" type="text" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Cari Rincian" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary btn-sm" type="submit">
                                <i class="fas fa-search"></i> <!-- FontAwesome Icon -->
                            </button>
                            <!-- TOMBOL TAMBAH DATA -->
                            <a href="{{ url('rincian/create') }}" class="btn btn-primary btn-sm ml-2">
                                <i class="fas fa-plus"></i> Tambah Rincian Baru
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
                            {{-- <th class="">Kode Rincian</th> --}}
                            <th class="">Faktur</th>
                            <th class="">Jumlah</th>
                            <th class="">Nama Barang</th>
                            <th class="">Harga</th>
                            <th class="">Diskon</th>
                            <th class="">Total</th>
                            <th class="">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstItem()?>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $i }}</td>
                                {{-- <td>{{ $item->Kode_Rincian }}</td> --}}
                                <td>{{ $item->Kode_Faktur }}</td>
                                <td>{{ $item->Jumlah }}</td>
                                <td>{{ $item->Nama_Barang }}</td>
                                <td>{{ "Rp " . number_format($item->Harga_Awal, 0, ',', '.') }}</td>
                                <td>{{ $item->Diskon }}%</td>
                                <td>{{ "Rp " . number_format($item->Harga_Total, 0, ',', '.') }}</td>
                                <td>
                                    <a href='{{ url('rincian/'.$item->Kode_Rincian.'/edit') }}' class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form onsubmit="return confirm('Apakah Anda Yakin Akan Menghapus Data ?')" 
                                    class="d-inline" action="{{ url('rincian/'.$item->Kode_Rincian) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" name="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
