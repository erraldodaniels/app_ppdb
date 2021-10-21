<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LaporanExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {

        return view('laporan.cetak.reportexcel', [
            'laporan' => DB::table('tb_transaksi')->select('kode_transaksi', 'nama_customer', 'metode_bayar', DB::raw('SUM(total_harga) as total_harga'))->whereDate('tanggal_beli', DB::raw('CURDATE()'))->groupBy('kode_transaksi')->get()
        ]);
    }
}
