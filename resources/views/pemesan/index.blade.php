@extends('layout.main')
@section('content-wrapper')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">TABEL PEMESAN</h1>
    <div class="pb-3">
        <form class="d-flex" action="{{ url('faktur') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan Kode_Faktur/No_Faktur_Pajak/No_Surat_Jalan/No_Surat_Pembelian/Tanggal_Faktur/Kode_Pemesan" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>

    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">
        <a href='{{ url('pemesan/create') }}' class="btn btn-primary">Tambah Data</a>
    </div>

    <!-- TABEL -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="">No</th>
                <th class="">Kode_Faktur </th>
                <th class="">No_Faktur_Pajak</th>
                <th class="">No_Surat_Jalan</th>
                <th class="">No_Surat_Pembelian</th>
                <th class="">Tanggal_Faktur</th>
                <th class="">Kode_Pemesan </th>
                <th class="">Subtotal</th>
                <th class="">DP</th>
                <th class="">Diskon_Harga</th>
                <th class="">PPN</th>
                <th class="">Total</th>
                <th class="col-md-1">Aksi</th>
            </tr>
        </thead>
        {{-- <tbody>
            <?php $i = $data->firstItem() ?>
            @foreach ($data as $item)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $item->Kode_Faktur }}</td>
                <td>{{ $item->No_Faktur_Pajak }}</td>
                <td>{{ $item->No_Surat_Jalan }}</td>
                <td>{{ $item->No_Surat_Pembelian }}</td>
                <td>{{ $item->Tanggal_Faktur }}</td>
                <td>{{ $item->Kode_Pemesan }}</td>
                <td>{{ $item->Subtotal }}</td>
                <td>{{ $item->DP }}</td>
                <td>{{ $item->Diskon_Harga }}</td>
                <td>{{ $item->PPN }}</td>
                <td>{{ $item->Total }}</td>
                <td>
                    <a href='' class="btn btn-warning btn-sm">Edit</a>
                    <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ url('faktur/'.$item->Kode_Faktur) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php $i++ ?> 
            @endforeach
        </tbody> --}}
    </table class="table table-striped">
    {{-- {{ $data->withQueryString()->links() }} --}}
    <br>
</div>
@endsection
