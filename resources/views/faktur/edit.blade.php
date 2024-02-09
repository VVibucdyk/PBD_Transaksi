@extends('layout.main')
@section('content-wrapper')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">FAKTUR BARU</h1>
    <form action='{{url('faktur/'.$data->Kode_Faktur)}}' method='post'>
        @csrf
        @method('PUT')
        <div class="my-3 p-3">
            <div class="mb-3 row">
                <label for="Kode_Faktur" class="col-sm-2 col-form-label">Kode_Faktur</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='Kode_Faktur' id="Kode_Faktur" value="{{ $data->Kode_Faktur }}" readonly>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="No_Faktur_Pajak" class="col-sm-2 col-form-label">No_Faktur_Pajak</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='No_Faktur_Pajak' id="No_Faktur_Pajak" value="{{ $data->No_Faktur_Pajak }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="No_Surat_Jalan" class="col-sm-2 col-form-label">No_Surat_Jalan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='No_Surat_Jalan' id="No_Surat_Jalan" value="{{ $data->No_Surat_Jalan }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="No_Surat_Pembelian" class="col-sm-2 col-form-label">No_Surat_Pembelian</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='No_Surat_Pembelian' id="No_Surat_Pembelian" value="{{ $data->No_Surat_Pembelian }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Tanggal_Faktur" class="col-sm-2 col-form-label">Tanggal_Faktur</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name='Tanggal_Faktur' id="Tanggal_Faktur" value="{{ $data->Tanggal_Faktur }}" readonly>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Subtotal" class="col-sm-2 col-form-label">Nama_Pemesan</label>
                <div class="col-sm-10">
                    <select name="Kode_Pemesan" id="Kode_Pemesan" class="form-control" onchange="{{ $data->Kode_Pemesan }}" oninput="{{ $data->Kode_Pemesan }}">
                            <option value="{{ $data->Kode_Pemesan }}"> Pilih Pemesan </option>
                        @foreach ($data2 as $item2)
                            <option value="{{ $item2->Kode_Pemesan }}" @if($item2->Kode_Pemesan == $data->Kode_Pemesan) selected @endif > {{ $item2->Kode_Pemesan }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Subtotal" class="col-sm-2 col-form-label">Subtotal</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='Subtotal' id="Subtotal" value="{{ $data->Subtotal }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="DP" class="col-sm-2 col-form-label">DP</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='DP' id="DP" value="{{ $data->DP }}">
                </div>
            </div><div class="mb-3 row">
                <label for="Diskon_Harga" class="col-sm-2 col-form-label">Diskon_Harga</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='Diskon_Harga' id="Diskon_Harga" value="{{ $data->Diskon_Harga }}">
                </div>
            </div><div class="mb-3 row">
                <label for="PPN" class="col-sm-2 col-form-label">PPN</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='PPN' id="PPN" value="{{ $data->PPN }}">
                </div>
            </div><div class="mb-3 row">
                <label for="Total" class="col-sm-2 col-form-label">Total</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='Total' id="Total" value="{{ $data->Total }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                    <a href='{{ url('faktur') }}' class="btn btn-primary">TABEL</a>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection
