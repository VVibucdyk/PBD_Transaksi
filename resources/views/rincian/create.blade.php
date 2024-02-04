@extends('layout.main')
@section('content-wrapper')

<form action='{{ url('rincian') }}' method='post'>
@csrf 
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('rincian') }}" class="btn btn-secondary"><< Kembali</a>
        <div class="mb-3 row">
            <label for="nim" class="col-sm-2 col-form-label">Kode Rincian</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='kode_rincian' id="kode_rincian" 
                value="{{ Session::get('Kode_Rincian')}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Kode Faktur</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='kode_faktur' id="kode_faktur"
                value="{{ Session::get('Kode_Faktur')}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Jumlah</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='jumlah' id="jumlah">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Nama Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama_barang' id="nama_barang">
            </div>
        </div>   
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Harga Awal</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='harga_awal' id="harga_awal">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Diskon</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='diskon' id="diskon">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Harga Total</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='harga_total' id="harga_total">
            </div>
        </div>                                             
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
@endsection