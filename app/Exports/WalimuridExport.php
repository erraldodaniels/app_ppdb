<?php

namespace App\Exports;

use App\Models\Walimurid;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class WalimuridExport implements FromView
{
    public function view(): View
    {
        return view('cetak.excel.walimurid', [
            'walimurid' => Walimurid::all()
        ]);
    }
}
