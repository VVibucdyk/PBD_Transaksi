@extends('layout.main')
@section('content-wrapper')

<form action='{{ url('rincian/'.$data->Kode_Rincian) }}' method='post'>
@csrf
@method('PUT') 
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('rincian') }}" class="btn btn-secondary"><< Kembali</a>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Kode Faktur</label>
            <div class="col-sm-10">
                <select name="kode_faktur" id="kode_faktur">
                    @foreach ($data2 as $item)
                        <option value="{{ $item->Kode_Faktur }}">{{ $item->Kode_Faktur }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Jumlah</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='jumlah' id="jumlah"
                value="{{ $data->Jumlah }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Nama Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama_barang' id="nama_barang"
                value="{{ $data->Nama_Barang }}">
            </div>
        </div>   
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Harga Awal</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='harga_awal' id="harga_awal"
                value="{{ $data->Harga_Awal }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Diskon</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='diskon' id="diskon"
                value="{{ $data->Diskon }}">
            </div>
        </div>                                             
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
@endsection