@extends('layout.main')
@section('content-wrapper')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- FORM PENCARIAN & TAMBAH DATA-->
            <div class="d-flex justify-content-between mb-3 align-items-center">
                <h1 class="h3 mb-0 text-gray-800"><strong>Daftar Faktur</strong></h1>
                <form class="d-inline-block" action="{{ url('faktur') }}" method="get">
                    <div class="input-group">
                        <input class="form-control form-control-sm" type="text" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Cari Faktur" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary btn-sm" type="submit">
                                <i class="fas fa-search"></i> <!-- FontAwesome Icon -->
                            </button>
                            <!-- TOMBOL TAMBAH DATA -->
                            <a href="{{ url('faktur/create') }}" class="btn btn-primary btn-sm ml-2">
                                <i class="fas fa-plus"></i> Tambah Faktur Baru
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- TABEL -->
            <div class="table-responsive">
                <table class="table table-striped" style="font-size: 12px">
                    <thead>
                        <tr>
                            <th style="vertical-align: top">No</th>
                            <th style="vertical-align: top">Faktur <br> Faktur Pajak</th>
                            {{-- <th>Faktur Pajak</th> --}}
                            <th style="vertical-align: top">Surat Jalan <br> Surat Pembelian</th>
                            {{-- <th>Surat Pembelian</th> --}}
                            <th style="vertical-align: top">Tanggal</th>
                            <th style="vertical-align: top">Pemesan</th>
                            <th style="vertical-align: top">Subtotal</th>
                            <th style="vertical-align: top">DP</th>
                            <th style="vertical-align: top">Diskon</th>
                            <th style="vertical-align: top">PPN</th>
                            <th style="vertical-align: top">Total</th>
                            <th style="vertical-align: top">Status</th>
                            {{-- <th class="col-md-1">Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstItem() ?>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->Kode_Faktur }} <br> {{ $item->No_Faktur_Pajak }}</td>
                            {{-- <td>{{ $item->No_Faktur_Pajak }}</td> --}}
                            <td>{{ $item->No_Surat_Jalan }} <br> {{ $item->No_Surat_Pembelian }}</td>
                            {{-- <td>{{ $item->No_Surat_Pembelian }}</td> --}}
                            <td>{{ $item->Tanggal_Faktur }}</td>
                            <td>{{ $item->pemesan->Nama_Pemesan }}</td>
                            <td>{{ "Rp " . number_format($item->Subtotal, 0, ',', '.') }}</td>
                            <td>{{ $item->DP."%" }}</td>
                            <td>{{ $item->Diskon_Harga."%" }}</td>
                            <td>{{ "Rp " . number_format($item->PPN, 0, ',', '.') }}</td>
                            <td>{{ "Rp " . number_format($item->Total, 0, ',', '.') }}</td>
                            <td>
                                <form onsubmit="return confirm('Yakin akan mengganti status Faktur?')" class="d-inline" action="{{ url('faktur/'.$item->Kode_Faktur) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                        <button style="width: 80px; type="submit" name="submit" class="btn btn-sm 
                                    @if ($item->Status == 'Open')
                                        btn-success"><i class="far fa-eye"></i>
                                    @else
                                        btn-danger"><i class="far fa-eye-slash"></i>
                                    @endif
                                        {{ $item->Status }}</button>
                                        
                                </form>
                                <form onsubmit="return confirm('Yakin akan menghapus Faktur?')" class="d-inline" action="{{ url('faktur/'.$item->Kode_Faktur) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                            <td>
                                
                            </td>
                            {{-- <td>
                                <a href='{{ url('faktur/'.$item->Kode_Faktur.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ url('faktur/'.$item->Kode_Faktur) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td> --}}
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
