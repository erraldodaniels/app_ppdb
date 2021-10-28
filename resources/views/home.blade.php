@extends('layouts.template')
@section('content')
<title>Dashboard</title>

@if( Session::get('berhasil') !="")
<div class='alert alert-success'><center><b>{{Session::get('berhasil')}}</b></center></div>
@endif
<div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Barang</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_barang}}</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-calendar fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-dark shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Transaksi</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_transaksi}}</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-list fa-2x text-gray-300"></i>
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
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pemasukan</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ "Rp " . number_format($total_transaksi,2,',','.')}}</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-cash-register fa-2x text-gray-300"></i>
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
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Keuntungan</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">@foreach($keuntungan_current as $num => $untung){{ "Rp " . number_format($untung->jumlah_keuntungan,2,',','.')}}@endforeach</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Transaksi Hari Ini</h6>
    </div>
    <div class="card-body">
    <div class="table-responsive">
            <table id="dataTable" class="table table-bordered" cellspacing="0">
              <div class="row">
                <div class="col-md-12 mb-4 text-right">
                    <a href="{{ route('export.excel') }}" class="btn btn-success"><i class="fas fa-file-excel"></i>&nbsp;Excel</a>
                </div>
              </div>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Transaksi</th>
                        <th>Nama Customer</th>
                        <th>Total Beli</th>
                        <th>Metode Pembayaran</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporan_hariini as $i => $u)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$u->kode_transaksi}}</td>
                        <td>{{$u->nama_customer}}</td>
                        <td>{{ "Rp " . number_format($u->total_harga,2,',','.')}}</td>
                        <td>{{$u->metode_bayar}}</td>
                        <td><a href="/laporan/{{ $u->kode_transaksi}}" class="btn btn-primary btn-sm ml-2">View</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
