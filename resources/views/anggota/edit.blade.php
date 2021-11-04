@extends('layouts.template')
@section('content')
<title>Data Anggota</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data {{$anggota->nama_anggota}}</h6>
    </div>
    <div class="card-body">
        <form action="/anggota/update" method="post">
            @csrf
            <div class="form-group">
                <label for="">Kode RFID</label>
                <input type="hidden" name="id" value="{{$anggota->id_anggota}}">
                <input type="text" name="rfid" class="form-control" value="{{$anggota->kode_rfid}}">
            </div>
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="name" class="form-control" value="{{$anggota->nama_anggota}}">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" value="{{$anggota->email}}">
            </div>
            <input type="submit" value="Update" class="btn btn-warning">
        </form>
    </div>
</div>


@endsection