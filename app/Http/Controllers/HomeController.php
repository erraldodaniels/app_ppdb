<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
        * @return \Illuminate\Contracts\Support\Renderable
        */
    public function index()
    {   
        $tanggal= Carbon::now();
        $jumlah_ref = DB::table('tbl_user_reference')->count();
        $jumlah_barang =  DB::table('tb_barang')->count();
        $total_transaksi =  DB::table('tb_transaksi')->whereDate('tanggal_beli', DB::raw('CURDATE()'))->sum('total_harga');
        $jumlah_kasir =  DB::table('users')->where('level','K')->count();
        $jumlah_transaksi =  DB::table('tb_kembalian')->whereDate('tanggal_transaksi', DB::raw('CURDATE()', 'tanggal_beli'))->count();
        $laporan_hariini= DB::table('tb_transaksi')->select('kode_transaksi', 'nama_customer', 'metode_bayar', DB::raw('SUM(total_harga) as total_harga'))->whereDate('tanggal_beli', DB::raw('CURDATE()'))->groupBy('kode_transaksi')->get();
        $keuntungan_current = DB::table('tb_kembalian')->select(DB::raw("SUM(keuntungan) AS jumlah_keuntungan"))->where('tanggal_transaksi','=',$tanggal->toDateString())->get();

        return view('home',compact('jumlah_ref','jumlah_barang','total_transaksi','jumlah_transaksi','jumlah_kasir','laporan_hariini','keuntungan_current'));
    }
}
