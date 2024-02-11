@extends('layout.main')
@section('content-wrapper')

<div class="container-fluid pt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="m-0 font-weight-bold">Edit Rincian Faktur</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('rincian/'.$data->Kode_Rincian) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="Kode_Faktur">Kode Faktur:</label>
                            <select name="kode_faktur" id="kode_faktur">
                                @foreach ($data2 as $item)
                                    <option value="{{ $item->Kode_Faktur }}">{{ $item->Kode_Faktur }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah:</label>
                            <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{ $data->Jumlah }}">
                        </div>
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang:</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $data->Nama_Barang }}">
                        </div>
                        <div class="form-group">
                            <label for="harga_awal">Harga Awal:</label>
                            <input type="text" class="form-control" id="harga_awal" name="harga_awal" value="{{ $data->Harga_Awal }}">
                        </div>
                        <div class="form-group">
                            <label for="diskon">Diskon:</label>
                            <input type="tex" class="form-control" id="diskon" name="diskon" value="{{ $data->Diskon }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ url('rincian') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection