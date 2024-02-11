@extends('layout.main')
@section('content-wrapper')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="m-0 font-weight-bold">Tambah Faktur Baru</h4>
                </div>
                <div class="card-body">
                    <form action='{{url('faktur')}}' method='post'>
                        @csrf
                        <div class="mb-3 row">
                            <label for="Kode_Faktur" class="col-sm-2 col-form-label">Faktur</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" name='Kode_Faktur' id="Kode_Faktur" value="{{ $KodeFaktur }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="No_Faktur_Pajak" class="col-sm-2 col-form-label">Faktur Pajak</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" name='No_Faktur_Pajak' id="No_Faktur_Pajak" value="{{ $FakturPajak }}">
                            </div>
                        </div> 
                        <div class="mb-3 row">
                            <label for="No_Surat_Jalan" class="col-sm-2 col-form-label">Surat Jalan</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" name='No_Surat_Jalan' id="No_Surat_Jalan" value="{{ $SuratJalan }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="No_Surat_Pembelian" class="col-sm-2 col-form-label">Surat Pembelian</label>
                            <div class="col-sm-10">
                                <input readonly type="text" class="form-control" name='No_Surat_Pembelian' id="No_Surat_Pembelian" value="{{ $SuratPembelian }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="Tanggal_Faktur" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name='Tanggal_Faktur' id="Tanggal_Faktur" value="{{ Session::get('Tanggal_Faktur') }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="Subtotal" class="col-sm-2 col-form-label">Pemesan</label>
                            <div class="col-sm-10">
                                <select name="Kode_Pemesan" id="Kode_Pemesan" class="form-control">
                                        <option value=""> Pilih Pemesan </option>
                                    @foreach ($data as $item)
                                        <option value="{{ $item->Kode_Pemesan }}"  >{{ $item->pelanggan->Nama_Pelanggan }} dengan user {{ $item->Nama_Pemesan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- <div class="mb-3 row">
                            <label for="Subtotal" class="col-sm-2 col-form-label">Subtotal</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name='Subtotal' id="Subtotal" value="{{ Session::get('Subtotal') }}">
                            </div>
                        </div> --}}
                        <div class="mb-3 row">
                            <label for="DP" class="col-sm-2 col-form-label">DP (%)</label>
                            <div class="col-sm-10">
                                <?php
                                    if (Session::has('DP')) {
                                        $nilaiDP = Session::get('DP');
                                    } else {
                                        $nilaiDP = 0;
                                    }
                                ?>
                                <input type="number" class="form-control" name='DP' id="DP" value="<?php echo $nilaiDP; ?>" max="100" min="0">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="Diskon_Harga" class="col-sm-2 col-form-label">Diskon_Harga (%)</label>
                            <div class="col-sm-10">
                                <?php
                                    if (Session::has('Diskon_Harga')) {
                                        $nilaiDiskonHarga = Session::get('Diskon_Harga');
                                    } else {
                                        $nilaiDiskonHarga = 0;
                                    }
                                ?>
                                <input type="number" class="form-control" name='Diskon_Harga' id="Diskon_Harga" value="<?php echo $nilaiDiskonHarga; ?>" max="100" min="0">
                            </div>
                        </div>
                        {{-- <div class="mb-3 row">
                            <label for="PPN" class="col-sm-2 col-form-label">PPN</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name='PPN' id="PPN" value="{{ Session::get('PPN') }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="Total" class="col-sm-2 col-form-label">Total</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name='Total' id="Total" value="{{ Session::get('Total') }}">
                            </div>
                        </div> --}}
                        <div class="mb-3 row">
                            <label for="" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                                <a href='{{ url('faktur') }}' class="btn btn-primary">TABEL</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
