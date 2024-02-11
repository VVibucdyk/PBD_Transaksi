@extends('layout.main')
@section('content-wrapper')
<div class="container-fluid pt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="m-0 font-weight-bold">Tambah Rincian Baru</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('rincian') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="Kode_Faktur">Kode Faktur:</label>
                            <select name="kode_faktur" id="kode_faktur">
                                @foreach ($data as $item)
                                    <option value="{{ $item->Kode_Faktur }}">{{ $item->Kode_Faktur }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah:</label>
                            <input type="text" class="form-control" id="jumlah" name="jumlah">
                        </div>
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang:</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                        </div>
                        <div class="form-group">
                            <label for="harga_awal">Harga Awal:</label>
                            <input type="text" class="form-control" id="harga_awal" name="harga_awal">
                        </div>
                        <div class="form-group">
                            <label for="diskon">Diskon:</label>
                            <input type="tex" class="form-control" id="diskon" name="diskon">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href='{{ url('rincian') }}' class="btn btn-primary">TABEL</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection