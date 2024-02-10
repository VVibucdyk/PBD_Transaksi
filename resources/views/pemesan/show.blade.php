{{-- resources/views/pemesan/show.blade.php --}}
@extends('layout.main')

@section('content-wrapper')
<div class="container-fluid pt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="m-0 font-weight-bold">Detail Pemesan</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label><strong>Nama Pemesan:</strong></label>
                        <p>{{ $pemesan->Nama_Pemesan }}</p>
                    </div>
                    <div class="form-group">
                        <label><strong>Jabatan:</strong></label>
                        <p>{{ $pemesan->Jabatan }}</p>
                    </div>
                    <div class="form-group">
                        <label><strong>Kode Pelanggan:</strong></label>
                        <p>{{ $pemesan->Kode_Pelanggan }}</p>
                    </div>
                    <div class="form-group">
                        <label><strong>Telepon:</strong></label>
                        <p>{{ $pemesan->Telepon }}</p>
                    </div>
                    <div class="form-group">
                        <label><strong>Email:</strong></label>
                        <p>{{ $pemesan->Email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
