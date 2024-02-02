@extends('layout.main')
@section('content-wrapper')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">INI HALAMAN FAKTUR</h1>
    <br>
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
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>1</td>
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
                    <a href='' class="btn btn-warning btn-sm">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
