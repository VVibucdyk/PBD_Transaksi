@extends('layout.main')
@section('content-wrapper')
<div class="container">
  <div class="card">
    <!-- HEADER -->
    <div class="card-header">
      Invoice
      <strong>01/01/01/2018</strong>
      <span class="float-right"> <strong>Status:</strong> Pending</span>
    </div>

    <div class="card-body">
      <!-- TITLE PT.GURITA MANDALA PERSADA,FAKTUR PENJUALAN -->
      <div class="row mb-1">
        <div class="col-sm-6">
          <div style="border-bottom: 2px solid black; width: 100%; max-width: 450px;font-size: 25px;">PT.GURITA MANDALA PERSADA</div>
        </div>
        <div class="col-sm-6">
          <div style="border-bottom: 2px solid black; width: 100%; max-width: 450px;font-size: 25px;">FAKTUR PENJUALAN</div>
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
              <div>: -Nama Pelanggan-</div>
            </div>
          </div>
          <div class="row">
            <div class="col-3">
              <div>Alamat</div>
            </div>
            <div class="col">
              <div>: -Alamat Pelanggan-</div>
            </div>
          </div>
          <div class="row">
            <div class="col-3">
              <div>Pemesan</div>
            </div>
            <div class="col">
              <div>: -Nama Pemesan-</div>
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
              <div>: -Kode Faktur-</div>
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <div>No. Faktur Pajak</div>
            </div>
            <div class="col">
              <div>: -Faktur Pajak-</div>
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <div>No. SJ</div>
            </div>
            <div class="col">
              <div>: -Surat jalan</div>
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <div>No. PO</div>
            </div>
            <div class="col">
              <div>: -Surat pembelian-</div>
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <div>Tanggal</div>
            </div>
            <div class="col">
              <div>: -tanggal faktur-</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Tabel Rincian -->
      <div class="table-responsive-sm">
        <table class="table table-striped">
          <thead>
            <tr>
              <th class="center">#</th>
              <th>Item</th>
              <th>Description</th>

              <th class="right">Unit Cost</th>
              <th class="center">Qty</th>
              <th class="right">Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="center">1</td>
              <td class="left strong">Origin License</td>
              <td class="left">Extended License</td>

              <td class="right">$999,00</td>
              <td class="center">1</td>
              <td class="right">$999,00</td>
            </tr>
            <tr>
              <td class="center">2</td>
              <td class="left">Custom Services</td>
              <td class="left">Instalation and Customization (cost per hour)</td>

              <td class="right">$150,00</td>
              <td class="center">20</td>
              <td class="right">$3.000,00</td>
            </tr>
            <tr>
              <td class="center">3</td>
              <td class="left">Hosting</td>
              <td class="left">1 year subcription</td>

              <td class="right">$499,00</td>
              <td class="center">1</td>
              <td class="right">$499,00</td>
            </tr>
            <tr>
              <td class="center">4</td>
              <td class="left">Platinum Support</td>
              <td class="left">1 year subcription 24/7</td>

              <td class="right">$3.999,00</td>
              <td class="center">1</td>
              <td class="right">$3.999,00</td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Subtotal,dp,disc,ppn,total  -->
      <div class="row">
        <div class="col-lg-4 col-sm-5 ml-auto">
          <table class="table table-clear">
            <tbody>
              <tr>
                <td class="left">
                  <strong>Subtotal</strong>
                </td>
                <td class="right">$8.497,00</td>
              </tr>
              <tr>
                <td class="left">
                  <strong>Discount (20%)</strong>
                </td>
                <td class="right">$1,699,40</td>
              </tr>
              <tr>
                <td class="left">
                  <strong>VAT (10%)</strong>
                </td>
                <td class="right">$679,76</td>
              </tr>
              <tr>
                <td class="left">
                  <strong>Total</strong>
                </td>
                <td class="right">
                  <strong>$7.477,36</strong>
                </td>
              </tr>
            </tbody>
          </table>

        </div>

      </div>

    </div>
  </div>
</div>
@endsection