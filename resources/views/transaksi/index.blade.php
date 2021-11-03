@extends('layouts.template')
@section('content')
<title>Transaksi</title>
<style>
.table {
  border-collapse: collapse;
  width: 100%;
}
.td {
  color:black;
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
</style>
@if( Session::get('gagal') !="")
            <div class='alert alert-danger'><center><b>{{Session::get('gagal')}}</b></center></div>        
            @endif
<div class="row">
    <div class="col-md-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Input Transaksi</h6>
            </div>
            <div class="card-body">
                <form action="/masuk/sementara" method="post">
                @csrf
                    <font color="blue">Kode Transaksi : {{$max_code}}</font>
                    <input type="hidden" name="kode_transaksi" value="{{$max_code}}">
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Masukan  Kode Barang (scan/manual)</label>
                                <input type="text" id="id_barang" name="id_barang" class="form-control" required autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">  
                        <div class="col-md-12">
                            <label for="">Nama Barang</label>
                            <input type="text" id="nama" readonly name="nama_barang"  class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label for="">Harga Barang</label>
                            <input type="text" id="harga" readonly name="harga" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <label for="">Jumlah</label>
                            <input type="number" id="jumlah" name="jumlah_beli" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12 mt-4 text-right">
                            <input type="submit" id="btn_submit" class="btn btn-success" value="Submit">
                        </div>
                    </div>
                </form>
            </div>  
        </div>
    </div>
    <div class="col-md-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th class="td"></th>
                        <th class="td">Barang</th>
                        <th class="td">Jumlah</th>
                        <th class="td">Harga</th>
                        <th class="td">Total</th>
                    </tr> 
                    @foreach($sementara as $u)
                    <tr>
                        <td class"td"><a href="/hapus/{{$u->id_sementara}}"><i class="fas fa-trash"></i></a></td>
                        <td class="td">{{$u->nama_barang}}</td>
                        <td class="td">{{$u->jumlah_beli}}</td>
                        <td class="td">{{$u->harga_barang}}</td>
                        <td class="td">{{$u->total_harga}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" class="td" style="text-align:right">Total Harga : </td>
                        <td class="td">{{$jumlah}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Checkout </button></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Checkout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Detail Customer</h6>
                            </div>
                            <div class="card-body">
                                <form action="/masuk/semua" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">ID Card</label>
                                        <input type="text" id="kode_rfid" name="kode_rfid" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Pembeli</label>
                                        <input type="text" id="nama_anggota" name="nama_anggota" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Saldo StarbhakPay</label>
                                        <input type="text" id="saldo_tunai" name="saldo_tunai" class="form-control" readonly>
                                    </div>
                            </div>  
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Payment</h6>
                            </div>
                            <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Metode Pembayaran</label>
                                        <select class="form-control" id="metodebyr" name="methodbayar" disabled>
                                            <option value="">- Pilih Metode Pembayaran -</option>
                                            <option value="Cash">Cash</option>
                                            <option value="QRIS" data-toggle="modal" data-target="#qrisModal">QRIS</option>
                                            <option value="StarPay">StarPay</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Total :</label>
                                        <h1><b>Rp. {{ $jumlah }}</b></h1>
                                        <input type="hidden" id="totalbeli" value="{{$jumlah}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Bayar</label>
                                        <input type="hidden" name="kode_transaksi_kembalian" value="{{$max_code}}">
                                        <input type="number" id="bayar" name="bayar" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kembalian</label>
                                        <input type="number" id="kembali" name="kembalian" readonly class="form-control">
                                    </div>
                                    <div class="form-group text-right mt-3">
                                        <input type="submit" class="btn btn-success" value="Submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')

<script type="text/javascript">
    $('#country').change(function(){
    var kategoriID = $(this).val();    
    if(kategoriID){
        $.ajax({
           type:"GET",
           url:"{{url('ambil')}}?kategori_id="+kategoriID,
           success:function(res){               
            if(res){
                $("#state").empty();
                $("#state").append('<option></option>');
                $.each(res,function(key,value){
                    $("#state").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#state").empty();
            }
           }
        });
    }else{
        $("#state").empty();
       
    }      
   });

   $('#state').change(function(){
    var idbarang = $(this).val();    
    if(idbarang){
        $.ajax({
           type:"GET",
           url:"{{url('ambil2')}}?id_barang="+idbarang,
           success:function(res){               
            if(res){
                $("#harga").empty();
                $.each(res,function(key,value){
                    $("#harga").val(value);
                });
           
            }else{
               $("#state").empty();
            }
           }
        });
    }else{
        $("#state").empty();
       
    }      
   });

$('#id_barang').change(function(){
    setInterval(function(){ 
    if($('#id_barang').val()!=''){
        var id=$('#id_barang').val();
        $.ajax({
           type:"GET",
           url:"{{url('nyokot')}}?id_barang="+id,
           success:function(res){               
            if(res){
                $.each(res,function(key,value){
                    $("#harga").val(key);
                    $("#nama").val(value);
                    $("#jumlah").focus();
                    $("#jumlah").keyup(function(){
                        $("#btn_submit").focus();
                    });
                });
            }else{
                $("#harga").empty();
                $("#nama").empty();
            }
           }
        });
    }
}, 500);
});

$('#kode_rfid').change(function(){
    setInterval(function(){ 
    if($('#kode_rfid').val()!=''){
        var id=$('#kode_rfid').val();
        $.ajax({
           type:"GET",
           url:"{{url('getIdCard')}}?kode_rfid="+id,
           success:function(res){               
            if(res){
                $.each(res,function(key,value){
                    $("#saldo_tunai").val(key);
                    $("#nama_anggota").val(value);
                    $("#metodebyr").attr("disabled", false);
                });
            }else{
                $("#saldo_tunai").empty();
                $("#nama_anggota").empty();
            }
           }
        });
    }
}, 500);
});

var a = $('#totalbeli').val();
var st = $('#saldotunai').val();
$('#metodebyr').change(function(){
        if($('#metodebyr').val() == "StarPay"){
            $('#metodebyr').val("StarPay");
            $('#bayar').val(a);
            console.log(a);
            total = a - a;
            $("#kembali").val(total);
        }
});



</script>
@endpush

@endsection