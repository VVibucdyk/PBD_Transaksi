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
                            <th class="">Kode Rincian</th>
                            <th class="">Kode Faktur</th>
                            <th class="">Jumlah</th>
                            <th class="">Nama Barang</th>
                            <th class="">Harga Awal</th>
                            <th class="">Diskon</th>
                            <th class="">Harga Total</th>
                            <th class="">Aksi</th>
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
@endsection
