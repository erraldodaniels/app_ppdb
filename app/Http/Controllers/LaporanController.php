<?php

namespace App\Http\Controllers;

use auth;
use DB;
use Illuminate\Http\Request;
use App\Exports\LaporanExport;
use Carbon\Carbon;
use Excel;

class LaporanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->middleware('auth');
    }

    public function index()
    {
        $laporan= DB::table('tb_kembalian')->get();

        return view('laporan/index',compact('laporan'));
    }

    public function detail($id)
    {
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
        $modal = DB::table('tb_transaksi')->where('kode_transaksi', $id)->join('tb_barang', function ($join) {
            $join->on('tb_transaksi.barang_id', '=', 'tb_barang.id_barang');
        })->selectRaw('jumlah_beli * modal_barang as modal_barang')->get();
        $keuntungan = $jumlah -  $modal->sum('modal_barang');
        return view('laporan/detail',compact('transaksi','kembalian','ambil','jumlah','kasir','keuntungan'));
    }

    public function export(){
        $tanggal = Carbon::now();
        $total_transaksi =  DB::table('tb_transaksi')->whereDate('tanggal_beli', DB::raw('CURDATE()'))->sum('total_harga');
        $laporan=  DB::table('tb_transaksi')->select('kode_transaksi', 'nama_customer', 'metode_bayar', DB::raw('SUM(total_harga) as total_harga'), DB::raw('GROUP_CONCAT(kode_transaksi) as kode_transaksi'))->whereDate('tanggal_beli', DB::raw('CURDATE()'))->groupBy('nama_customer')->get();
        $keuntungan_current = DB::table('tb_kembalian')->select(DB::raw("SUM(keuntungan) AS jumlah_keuntungan"))->where('tanggal_transaksi','=',$tanggal->toDateString())->get();
        return view("laporan.cetak.reportexcel",compact('tanggal','laporan','keuntungan_current','total_transaksi'));
    }
}
