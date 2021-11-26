@extends('layouts.template')
@section('content')
<title>Data Referensi Pendaftar</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Referensi Pendaftar</h6>
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
                        <th>Kode Referral</th>
                        <th>Nama</th>
                        <th>No. Handphone</th>
                        <th>Referensi</th>
                        <th>Sekolah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user_ref as $i => $u)
                    <tr>
                        <td>{{++$i}}</td>
                        <td><b>{{$u->ref_code}}</b></td>
                        <td>{{$u->nama}}</td>
                        <td>{{$u->no_hp}}</td>
                        <td>{{$u->tipe_ref}}</td>
                        <td>{{$u->sekolah}}</td>
                        <!--<td>
                            <a href="/anggota/edit/#" class="btn btn-primary btn-sm ml-2" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom"><i class="fa fa-pen"></i></a>
                            <a href="/anggota/delete/#" class="btn btn-danger btn-sm ml-2"><i class="fa fa-trash"></i></a>
                        </td>     -->     
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
    <form action="/referensi/add" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="">Nama Lengkap</label>
            <input type="text" name="name" class="form-control"  required>
        </div>
        <div class="form-group">
            <label for="">No. Handphone</label>
            <input type="text" name="no_hp" class="form-control"  required>
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control"  required>
        </div>
        <div class="form-group">
            <label for="">Tipe Referensi</label>
                <select name="tipe_ref" id="tipe_ref" class="myselect form-control"  required>
                          <option selected disabled value="">Pilih Tipe Referensi</option>
                          <option value="Siswa">Siswa</option>
                          <option value="Wali Kelas">Wali Kelas</option>
                </select>
        </div>
        <div class="form-group">
            <label for="">Kelas</label>
                <select name="kelas" id="kelas" class="myselect form-control"  required>
                          <option value="none">Kelas</option>
                          @foreach ($kelas as $k)
                          <option value="{{$k->nama_kelas}}">{{$k->nama_kelas}}</option>
                          @endforeach
                </select>
        </div>
        <div class="form-group">
            <label for="">Sekolah</label>
            <input type="text" name="sekolah" id="sekolah" class="form-control"  required>
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

@push('scripts')
<script type="text/javascript">
    $('#tipe_ref').change(function(){
        if($('#tipe_ref').val() == "Siswa"){
            $('#sekolah').val("SMK Taruna Bhakti");
            $('#sekolah').attr("readonly",true);
        }
        else if($('#tipe_ref').val() == "Wali Kelas"){
            $('#kelas').attr("disabled",true);
            
        }
    })
</script>
@endpush

@endsection