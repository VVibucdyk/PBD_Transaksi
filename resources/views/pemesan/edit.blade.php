{{-- resources/views/pemesan/edit.blade.php --}}
@extends('layout.main')

@section('content-wrapper')
<div class="container-fluid pt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="m-0 font-weight-bold">Edit Pemesan</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('pemesan.update', $pemesan->Kode_Pemesan) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="Nama_Pemesan">Nama Pemesan:</label>
                            <input type="text" class="form-control" id="Nama_Pemesan" name="Nama_Pemesan" value="{{ $pemesan->Nama_Pemesan }}" required>
                        </div>
                        <div class="form-group">
                            <label for="Jabatan">Jabatan:</label>
                            <input type="text" class="form-control" id="Jabatan" name="Jabatan" value="{{ $pemesan->Jabatan }}" required>
                        </div>
                        <div class="form-group">
                            <label for="Kode_Pelanggan">Kode Pelanggan:</label>
                            <input type="number" class="form-control" id="Kode_Pelanggan" name="Kode_Pelanggan" value="{{ $pemesan->Kode_Pelanggan }}" required>
                        </div>
                        <div class="form-group">
                            <label for="Telepon">Telepon:</label>
                            <input type="text" class="form-control" id="Telepon" name="Telepon" value="{{ $pemesan->Telepon }}">
                        </div>
                        <div class="form-group">
                            <label for="Email">Email:</label>
                            <input type="email" class="form-control" id="Email" name="Email" value="{{ $pemesan->Email }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection