@extends('layout.main')
@section('content-wrapper')
<div class="container">
    <div class="card shadow mb-4">
        <!-- HEADER -->
        <div class="card-header">
            <strong>
                <a href='{{ url('cetak/') }}' class="btn btn-info btn-sm">
                    <i class="fa fa-print"></i> Cetak Faktur</a>
                    &nbsp;&nbsp; Operator By : {{Auth::user()->first_name}} {{ Auth::user()->last_name !== null ? Auth::user()->last_name : ''}}
            </strong>
        </div>
        <!-- Page Wrapper -->
        <div class="card-body" id="wrapper">

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Content Informasi Total Data -->
                        <div class="row">
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Total Data Faktur</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countFaktur }}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Total Data Rincian</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countRincian }}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Data Pemesan
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $countPemesan }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Total Data Pelanggan</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countPelanggan }}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content Prestasi -->

                        <div class="row">
                            <!-- Area Chart Faktur TERMAHAL -->
                            <div class="col-xl-4 col-lg-4">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Faktur TERMAHAL : {{ "Rp " . number_format($fakturTermahal->Total, 0, ',', '.') }}</h6>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-area" style="font-size: 14px">
                                            <p>Nomor Faktur: <strong>{{ $fakturTermahal->Kode_Faktur }}</strong></p>
                                            <p>Nama Pemesan: <strong>{{ $fakturTermahal->pemesan->Nama_Pemesan }}</strong></p>
                                            <p>Email: {{ $fakturTermahal->pemesan->Email }}</p>
                                            <p>Telepon: {{ $fakturTermahal->pemesan->Telepon }}</p>
                                            <p>Dari: {{ $fakturTermahal->pemesan->pelanggan->Nama_Pelanggan }}</p>
                                            <p>Jabatan: {{ $fakturTermahal->pemesan->Jabatan }}</p>
                                            <p>Alamat: {{ $fakturTermahal->pemesan->pelanggan->Alamat }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Area Chart Total Faktur 5 Bulan Terakhir -->
                            <div class="col-xl-4 col-lg-4">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Total Faktur 5 Bulan Terakhir</h6>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-area" style="font-size: 14px">
                                            @foreach($totalPerTahun->take(5) as $total)
                                                <p>{{ $total->tahun }} / {{ $total->bulan }}: Dengan Total {{ "Rp " . number_format($total->total, 0, ',', '.') }}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Area Chart -->
                            <div class="col-xl-4 col-lg-4">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary"></h6>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-area" style="font-size: 14px">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content Row -->
                        <div class="row">

                            
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
    </div>
</div>
@endsection