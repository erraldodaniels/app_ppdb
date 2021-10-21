<?php

namespace App\Exports;

use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LaporanExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {   
        
        return view('laporan.cetak.reportexcel', [
            'laporan' => DB::table('tb_transaksi')->whereDate('tanggal_beli', DB::raw('CURDATE()'))->get()
        ]);
    }
}
