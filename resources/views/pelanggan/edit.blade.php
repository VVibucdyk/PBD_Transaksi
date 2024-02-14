@extends('layout.main')
@section('content-wrapper')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">PELANGGAN BARU</h1>
    <form action='{{url('pelanggan/'.$data->Kode_Pelanggan)}}' method='post'>
        @csrf
        @method('PUT')
        <div class="my-3 p-3">
            <div class="mb-3 row">
                <label for="Kode_Pelanggan" class="col-sm-2 col-form-label">Kode Pelanggan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='Kode_Pelanggan' id="Kode_Pelanggan" value="{{ $data->Kode_Pelanggan }}" readonly>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Nama_Pelanggan" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='Nama_Pelanggan' id="Nama_Pelanggan" value="{{ $data->Nama_Pelanggan }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='Alamat' id="Alamat" value="{{ $data->Alamat }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                    <a href='{{ url('pelanggan') }}' class="btn btn-primary">TABEL</a>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection
