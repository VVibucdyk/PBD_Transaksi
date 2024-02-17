@extends('layout.main')
@section('content-wrapper')
<div class="container">
  <div class="card shadow mb-4">
    <!-- HEADER -->
    <div class="card-header">
      <form class="d-inline-block" action="{{ url('cetak/view') }}" method="get">
        <strong>
          FAKTUR :  
          <select name="SearchFaktur" id="SearchFaktur" class="btn btn-sm btn-outline-secondary">
            @foreach ($dataSearch as $item)
                <option value="<?php echo $item->Kode_Faktur ?>">{{ $item->Kode_Faktur }}</option>
            @endforeach
          </select>
            <button class="btn btn-outline-secondary btn-sm" type="submit">
                <i class="fas fa-search"></i> <!-- FontAwesome Icon -->
            </button>
            <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-sm">
              <i class="fa fa-home"></i> <!-- FontAwesome Icon -->
            </a>
        </strong>
      </form>
      <span class="float-right">
        <strong>
        </strong>
      </span>
      <span class="float-right">
        <strong>Status: &nbsp;</strong>
      </span>
      
    </div>

    <div class="card-body">
      <!-- TITLE PT.GURITA MANDALA PERSADA,FAKTUR PENJUALAN -->
      <div class="row mb-1" style="border-bottom: 2px solid black;">
        <div class="col-sm-6">
          <div style="width: 100%; max-width: 450px;font-size: 25px;">PT.GURITA MANDALA PERSADA</div>
        </div>
        <div class="col-sm-6">
          <div style="width: 100%; max-width: 450px;font-size: 25px;">FAKTUR PENJUALAN</div>
        </div>
      </div>

      <!-- Kepada, No.faktur dll -->
      <div class="row mb-1 height: 1500px;">
        <!-- Kolom 1 Kepada -->
        <div class="col-6">
          <div class="row">
            <div class="col-3">
              <div>Kepada</div>
            </div>
            <div class="col">
              <div>: </div>
            </div>
          </div>
          <div class="row">
            <div class="col-3">
              <div>Alamat</div>
            </div>
            <div class="col">
              <div>: </div>
            </div>
          </div>
          <div class="row">
            <div class="col-3">
              <div>Pemesan</div>
            </div>
            <div class="col">
              <div>: </div>
            </div>
          </div>
        </div>
        <!-- Kolom 2 No.faktur -->
        <div class="col-6">
          <div class="row">
            <div class="col-4">
              <div>No. Faktur</div>
            </div>
            <div class="col">
              <div>: </div>
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <div>No. Faktur Pajak</div>
            </div>
            <div class="col">
              <div>: </div>
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <div>No. SJ</div>
            </div>
            <div class="col">
              <div>: </div>
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <div>No. PO</div>
            </div>
            <div class="col">
              <div>: </div>
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <div>Tanggal</div>
            </div>
            <div class="col">
              <div>: </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Tabel Rincian -->
      <div class="table-responsive-sm" style="height:320px">
        <table class="table table-striped" style="line-height: 10px;">
          <thead>
            <tr>
              <th style="width: 20px">No</th>
              <th style="width: 50px">Banyaknya</th>
              <th style="width: 420px">Nama Barang</th>
              <th style="width: 200px">Harga</th>
              <th style="width: 50px">Diskon</th>
              <th >Total</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      </div>
      
      <!-- border-bottom only  -->
      <div class="row" style="border-bottom: 2px solid black;"></div>

      <!-- Subtotal,dp,disc,ppn,total  -->
      <div class="row">
        <div class="col-lg-5">
        </div>
        <div class="col-lg-3">
        </div>
        <div class="col-lg-4 col-sm-5 ml-auto">
          <table class="table table-clear">
            <tbody style="line-height: 12px;">
              <tr>
                <td class="left">
                  <strong>Subtotal</strong>
                </td>
                <td class="left">:</td>
              </tr>
              <tr>
                <td class="left">
                  <strong>DP</strong>
                </td>
                <td class="left">:</td>
              </tr>
              <tr>
                <td class="left">
                  <strong>Disc %</strong>
                </td>
                <td class="left">:</td>
              </tr>
              <tr>
                <td class="left">
                  <strong>PPn</strong>
                </td>
                <td class="left">:</td>
              </tr>
              <tr>
                <td class="left">
                  <strong>Total</strong>
                </td>
                <td class="left">
                  <strong>:</strong>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- date print, printed by, page of  -->
      <div class="row">
        <div class="col-lg-2">
          <div>
            {{-- -tanggal print- --}}
          </div>
        </div>
        <div class="col-lg-6">
          <div>
            {{-- -Printed by- --}}
          </div>
        </div>
        <div class="col-lg-4">
          <div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection