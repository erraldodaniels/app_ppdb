@extends('layouts.template')
@section('content')
<script>
// variabel global marker
var marker;
  
function taruhMarker(peta, posisiTitik){
    
    if( marker ){
      // pindahkan marker
      marker.setPosition(posisiTitik);
    } else {
      // buat marker baru
      marker = new google.maps.Marker({
        position: posisiTitik,
        map: peta
      });
    }
  
     // isi nilai koordinat ke form
    document.getElementById("lat").value = posisiTitik.lat();
    document.getElementById("lng").value = posisiTitik.lng();
    document.getElementById("alamat").value = posisiTiti
    
}
  
function initialize() {
  var propertiPeta = {
    center:new google.maps.LatLng(-6.3856499,106.8669721),
    zoom:9,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
  
  // even listner ketika peta diklik
  google.maps.event.addListener(peta, 'click', function(event) {
    taruhMarker(this, event.latLng);
  });

}


// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);

</script>
<title>Data Kasir | Kasir</title>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Kasir</h6>
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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $i => $u)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$u->name}}</td>
                        <td>{{$u->email}}</td>
                        <td>Password Tidak Ditampilkan</td>
                        <td><a href="/kasir/edit/{{ $u->id}}" class="btn btn-primary btn-sm ml-2">Edit</a><a href="/kasir/delete/{{ $u->id }}" class="btn btn-danger btn-sm ml-2"><i class="fa fa-trash"></i></a></td>
                                        
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
    <form action="/kasir/store" method="post">
        {{ csrf_field() }}
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
        <div class="form-group">
            <div id="googleMap" style="width:450px;height: 400px;"></div>
            <input type="hidden" class="form-control mb-2" id="lat" name="lat">
            <input type="hidden" class="form-control" id="lng" name="lng">
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