<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Auth;

class TransaksiController extends Controller
{

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->middleware('auth');
    }

    public function nyokot(Request $request)
    {
        $barang = DB::table("tb_barang")
        ->where("id_barang",$request->id_barang)
        ->pluck("nama_barang","harga_barang");
        return response()->json($barang);
    }

    public function nyokot2($id)
    {
        $barang = DB::table("tb_barang")
        ->where("id_barang",$id)
        ->pluck("harga_barang");
        return response()->json($barang);
    }


    public function ambil(Request $request)
    {
            
        $barang = DB::table("tb_barang")
        ->where("kategori_id",$request->kategori_id)
        ->pluck("nama_barang","id_barang");
        return response()->json($barang);
    }

        public function ambil2(Request $request)
    {
            
        $barang2 = DB::table("tb_barang")
        ->where("id_barang",$request->id_barang)
        ->pluck("harga_barang");
        return response()->json($barang2);
    }

    public function index()
    {
        $max = DB::table('tb_transaksi')->where('kode_transaksi', \DB::raw("(select max(`kode_transaksi`) from tb_transaksi)"))->pluck('kode_transaksi');
        $check_max = DB::table('tb_transaksi')->count();
        if($check_max == null){
            $max_code = "T0001";
        }else{
            $max_code = $max[0];
            $max_code++;
           
        }
        $kategori = DB::table('kategori')->get();
        $sementara = DB::table('tb_sementara')
                    ->join('tb_barang',function($join){
                        $join->on('tb_sementara.barang_id','=','tb_barang.id_barang');
                    })->get();

        $jumlah = DB::table('tb_sementara')
                ->join('tb_barang',function($join){
                    $join->on('tb_sementara.barang_id','=','tb_barang.id_barang');
                })->sum('total_harga');
        
        return view('transaksi/index',compact('kategori','max_code','sementara','jumlah'));
    }

    public function store(Request $request)
    {
        $cek = DB::table('tb_barang')->where('id_barang',$request->id_barang)->first();
        if ($cek->jumlah_barang < $request->jumlah_beli) {
            return redirect()->back();
        }

        $hitung = $request->harga * $request->jumlah_beli;
        $tanggal = date('Y-m-d');
        
        //$cek_sementara = DB::table('tb_sementara')->where('barang_id',$request->id_barang)->first();
        //if($cek_sementara->barang_id = $request->id_barang){
         //   $tambah = $cek_sementara->jumlah_beli + $request->jumlah_beli;
         //   DB::table('tb_sementara')->where('barang_id',$request->id_barang)->update(['jumlah_beli' => $tambah]);
        //}
        //else{
            DB::table('tb_sementara')->insert([
                'kode_transaksi'=>$request->kode_transaksi,
                'barang_id'=>$request->id_barang,
                'jumlah_beli'=>$request->jumlah_beli,
                'total_harga'=>$hitung,
                'pengguna_id'=>Auth::user()->id,
                'tanggal_beli'=>$tanggal            
            ]);
        //}

        return redirect()->back();
    }

    
    public function storesemua(Request $request)
    {
        $tanggal = date('Y-m-d');
        if($request->kembalian < 0){
            return redirect()->back()->with('gagal','Bayaran Kurang');
        }
        
        $select = DB::table('tb_sementara')->get();

        foreach ($select as $s) {
            DB::table('tb_transaksi')->insert([
                'kode_transaksi'=>$s->kode_transaksi,
                'barang_id'=>$s->barang_id,
                'jumlah_beli'=>$s->jumlah_beli,
                'total_harga'=>$s->total_harga,
                'metode_bayar'=>$request->methodbayar,
                'nama_customer'=>$request->nama_anggota,
                'pengguna_id'=>$s->pengguna_id,
                'tanggal_beli'=>$s->tanggal_beli       
            ]);
        }

        $modal = DB::table('tb_transaksi')->where('kode_transaksi', $request->kode_transaksi_kembalian)->join('tb_barang', function ($join) {
            $join->on('tb_transaksi.barang_id', '=', 'tb_barang.id_barang');
        })->selectRaw('jumlah_beli * modal_barang as modal_barang')->get();

        $jumlah =  DB::table('tb_transaksi')->where('kode_transaksi', $request->kode_transaksi_kembalian)
                    ->join('tb_barang',function($join){
                        $join->on('tb_transaksi.barang_id','=','tb_barang.id_barang');
                    })->sum('total_harga');

        $keuntungan = $jumlah - $modal->sum('modal_barang');

        DB::table('tb_kembalian')->insert([
            'kode_transaksi_kembalian'=>$request->kode_transaksi_kembalian,
            'bayar'=>$request->bayar,
            'kembalian'=>$request->kembalian,
            'keuntungan'=>$keuntungan,
            'tanggal_transaksi'=>$tanggal
        ]);

        
        DB::table('tb_anggota')
        ->where('nama_anggota', $request->nama_anggota)
        ->update(['saldo_tunai' => $request->updtsld]);

        foreach ($select as $s) {
            DB::table('tb_sementara')->truncate([
                'kode_transaksi'=>$s->kode_transaksi,
                'barang_id'=>$s->barang_id,
                'jumlah_beli'=>$s->jumlah_beli,
                'total_harga'=>$s->total_harga,
                'pengguna_id'=>$s->pengguna_id,
                'tanggal_beli'=>$s->tanggal_beli       
            ]);
        }

        $transaksi =DB::table('tb_transaksi')->where('kode_transaksi',$request->kode_transaksi_kembalian)
                ->join('tb_barang',function($join){
                    $join->on('tb_transaksi.barang_id','=','tb_barang.id_barang');
                })->get();
        $ambil =DB::table('tb_transaksi')->where('kode_transaksi',$request->kode_transaksi_kembalian)->first();
        $jumlah =  DB::table('tb_transaksi')->where('kode_transaksi',$request->kode_transaksi_kembalian)
                    ->join('tb_barang',function($join){
                        $join->on('tb_transaksi.barang_id','=','tb_barang.id_barang');
                    })->sum('total_harga');
        $kasir = DB::table('tb_transaksi')->where('kode_transaksi',$request->kode_transaksi_kembalian)
                ->join('users',function($join){
                    $join->on('tb_transaksi.pengguna_id','=','users.id');
                })->first();
        $kembalian=DB::table('tb_kembalian')->where('kode_transaksi_kembalian',$request->kode_transaksi_kembalian)->first();

        return view('transaksi/detail',compact('transaksi','kembalian','ambil','jumlah','kasir'));
    
        }

    public function cetak($id){

        $transaksi =DB::table('tb_transaksi')->where('kode_transaksi',$id)
                ->join('tb_barang',function($join){
                    $join->on('tb_transaksi.barang_id','=','tb_barang.id_barang');
                })->get();
        $ambil =DB::table('tb_transaksi')->where('kode_transaksi',$id)->first();
        $jumlah =  DB::table('tb_transaksi')->where('kode_transaksi',$id)
                    ->join('tb_barang',function($join){
                        $join->on('tb_transaksi.barang_id','=','tb_barang.id_barang');
                    })->sum('total_harga');
        $kasir = DB::table('tb_transaksi')->where('kode_transaksi',$id)
                ->join('users',function($join){
                    $join->on('tb_transaksi.pengguna_id','=','users.id');
                })->first();
        $kembalian=DB::table('tb_kembalian')->where('kode_transaksi_kembalian',$id)->first();
        
        return view('transaksi/struk',compact('transaksi','kembalian','ambil','jumlah','kasir'));

    }

    public function hapusitem($id){

	DB::table('tb_sementara')->where('id_sementara',$id)->delete();
	return redirect()->back();
    }

    public function getIdCard(Request $request){
        $anggota = DB::table("tb_anggota")
        ->where("kode_rfid", $request->kode_rfid)
        ->pluck("nama_anggota","saldo_tunai");
        return response()->json($anggota);
    }
}
