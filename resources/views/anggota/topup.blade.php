@extends('layouts.template')
@section('content')
<title>Data Anggota</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Top Up Saldo {{$anggotaSaldo->nama_anggota}}</h6>
    </div>
    <div class="card-body">
        <form action="/anggota/updatesaldo" method="post">
            @csrf
            <div class="form-group">
                <label for="">Saldo Awal</label>
                <input type="hidden" name="id" value="{{$anggotaSaldo->id_anggota}}">
                <input type="text" name="saldoawal" class="form-control" value="{{$anggotaSaldo->saldo_tunai}}" readonly>
            </div>
            <div class="form-group">
                <label for="">Jumlah Top Up</label>
                <input type="text" name="saldotambah" class="form-control">
            </div>
            <input type="submit" value="Top Up" class="btn btn-warning">
        </form>
    </div>
</div>


@endsection