{{-- resources/views/pemesan/create.blade.php --}}
@extends('layout.main')

@section('content-wrapper')
<div class="container-fluid pt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="m-0 font-weight-bold">Tambah Pemesan Baru</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('pemesan.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="Nama_Pemesan">Nama Pemesan:</label>
                            <input type="text" class="form-control" id="Nama_Pemesan" name="Nama_Pemesan" required>
                        </div>
                        <div class="form-group">
                            <label for="Jabatan">Jabatan:</label>
                            <input type="text" class="form-control" id="Jabatan" name="Jabatan" required>
                        </div>
                        <div class="form-group">
                            <label for="Kode_Pelanggan">Nama Pelanggan:</label>
                            <select name="Kode_Pelanggan" id="Kode_Pelanggan" class="form-control">
                                @foreach ($data as $item)
                                <option value="{{ $item->Kode_Pelanggan }}"  >{{ $item->Nama_Pelanggan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Telepon">Telepon:</label>
                            <input type="text" class="form-control" id="Telepon" name="Telepon">
                        </div>
                        <div class="form-group">
                            <label for="Email">Email:</label>
                            <input type="email" class="form-control" id="Email" name="Email">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href='{{ url('pemesan') }}' class="btn btn-primary">TABEL</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
