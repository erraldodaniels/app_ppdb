@extends('layouts.template')
@section('content')
<title>Data Anggota</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Anggota Koperasi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if( Session::get('masuk') !="")
            <div class='alert alert-success'><center><b>{{Session::get('masuk')}}</b></center></div>        
            @endif
            @if( Session::get('update') !="")
            <div class='alert alert-success'><center><b>{{Session::get('update')}}</b></center></div>        
            @endif
            <button class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah Data</button>
            <br>
            <br>
            <table id="dataTable" class="table table-bordered" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode RFID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Saldo</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anggota as $i => $u)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$u->kode_rfid}}</td>
                        <td>{{$u->nama_anggota}}</td>
                        <td>{{$u->email}}</td>
                        <td>{{$u->saldo_tunai}}</td>
                        <td>
                            <a href="/anggota/edit/{{ $u->kode_rfid}}" class="btn btn-primary btn-sm ml-2" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom"><i class="fa fa-pen"></i></a>
                            <a href="/anggota/delete/{{ $u->kode_rfid }}" class="btn btn-danger btn-sm ml-2"><i class="fa fa-trash"></i></a>
                            <a href="/anggota/topup/{{ $u->kode_rfid }}" class="btn btn-warning btn-sm ml-2"><i class="fa fa-wallet"></i></a>
                        </td>          
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="tambah" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Masukan Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
    <form action="/anggota/store" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="">Kode RFID</label>
            <input type="text" name="rfid" class="form-control"  required>
        </div>
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="name" class="form-control"  required>
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control"  required>
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control"  required>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
    </div>
</div>
</div>
@endsection