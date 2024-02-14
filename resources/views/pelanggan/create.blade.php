@extends('layout.main')
@section('content-wrapper')
<div class="container-fluid pt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="m-0 font-weight-bold">Tambah Pelanggan Baru</h4>
                </div>
                <div class="card-body">
                    <form action="{{url('pelanggan')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="Nama_Pelanggan">Nama Pelanggan:</label>
                            <input type="text" class="form-control" id="Nama_Pelanggan" name="Nama_Pelanggan" value="{{ Session::get('Nama_Pelanggan') }}">
                        </div>
                        <div class="form-group">
                            <label for="Alamat">Alamat:</label>
                            <input type="text" class="form-control" id="Alamat" name="Alamat" value="{{ Session::get('Alamat') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
