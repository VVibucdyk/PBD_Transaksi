@extends('layout.main')
@section('content-wrapper')
<div class="container">
  <div class="card">
    <!-- HEADER -->
    <div class="card-header">
      <strong>
        <a href='{{ url('cetak/') }}' class="btn btn-info btn-sm">
          <i class="fa fa-print"></i> Cetak Faktur</a>
      </strong>
    </div>
    <div class="card-body" style="height: 700px">
      <div class="row mb-1">
        <div class="col-sm-6">

        </div>
      </div>
    </div>
  </div>
</div>
@endsection