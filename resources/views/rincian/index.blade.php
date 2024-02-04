@extends('layout.main')
@section('content-wrapper')

<div class="container-fluid">
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="{{ url('rincian') }}" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder=" Masukkan Kode Rincian/Kode Faktur/Jumlah/Nama Barang/Harga Awal/Diskon/Harga Total" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='{{ url('rincian/create') }}' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="col-md-1">Kode Rincian</th>
                            <th class="col-md-1">Kode Faktur</th>
                            <th>Jumlah</th>
                            <th>Nama Barang</th>
                            <th>Harga Awal</th>
                            <th>Diskon</th>
                            <th>Harga Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstItem()?>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $item->Kode_Rincian }}</td>
                                <td>{{ $item->Kode_Faktur }}</td>
                                <td>{{ $item->Jumlah }}</td>
                                <td>{{ $item->Nama_Barang }}</td>
                                <td>{{ $item->Harga_Awal }}</td>
                                <td>{{ $item->Diskon }}</td>
                                <td>{{ $item->Harga_Total }}</td>
                                <td>
                                    <a href='{{ url('rincian/'.$item->Kode_Faktur.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                                    <form onsubmit="return confirm('Apakah Anda Yakin Akan Menghapus Data ?')" 
                                    class="d-inline" action="{{ url('rincian/'.$item->Kode_Rincian) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
            {{ $data->withQueryString()->links() }}
</div>
@endsection
