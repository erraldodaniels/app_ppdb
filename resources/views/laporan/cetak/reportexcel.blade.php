<?php
$file_name ="LaporanKoperasi_".$tanggal.".xls";

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file_name");

?>
<body>
<table border="1">
    <thead>
        <tr width="50">
            <td colspan="3" style="font-size: 22pt;"><center><b><h2>Laporan Penjualan</h2></b></center></td>
        </tr>
        <tr width="50">
            <td colspan="3" style="font-size: 18pt;"><center><b>Koperasi Serba Usaha<b></center></td>
        </tr>
        <tr>
            <td style="text-align:right;padding-right: 5px;font-size: 15pt;">Kasir :</td>
            <td colspan="2" style="text-align:left;padding-left: 8px;font-size: 15pt;"><b>{{Auth::user()->name}}</b></td>
        </tr>
        <tr>
            <td style="text-align:right;padding-right: 5px;font-size: 15pt;">Tanggal : </td>
            <td colspan="2" style="text-align:left;padding-left: 8px;font-size: 15pt;"><b>{{date('d-m-Y')}}</b></td>
        </tr>
    </thead>
    <tbody style="border-width: 3px;">
        <tr>
            <th style="font-size: 15pt;">No.</th>
            <th style="width: 150px;font-size: 15pt;">Nama Pembeli</th>
            <th style="width: 150px;font-size: 15pt;">Total Pembelian</th>
        </tr>

        @foreach ($laporan as $num => $item)
        <tr>
            <td style="text-align: center;font-size: 15pt;">{{$num+1}}</td>
            <td style="padding-left: 5px;font-size: 15pt;">{{$item->nama_customer}}</td>
            <td style="font-size: 15pt;">Rp. {{$item->total_harga}}</td>
        </tr>
        @endforeach
    </tbody>
        <tr></tr>
        <tr>
            <td colspan="2" style="text-align: right;padding-right: 9px;font-size: 15pt;">Total Transaksi : </td>
            <td style="font-size: 15;">Rp. {{$total_transaksi}}</td>
        </tr>
        @foreach ($keuntungan_current as $num => $untung)
        <tr>
            <td colspan="2" style="text-align: right;padding-right: 9px;font-size: 15pt;">Keuntungan : </td>
            <td style="font-size: 15pt;">Rp. {{$untung->jumlah_keuntungan}}</td>
        </tr>
        @endforeach
        <tr></tr>
        <tr>
            <td></td>
            <td style="text-align: center;width:70px;font-size: 15pt;">Kasir</td>
            <td style="text-align: center;font-size: 15pt;">Kepala Koperasi</td>
        </tr>
        <tr>
            <td style="height: 70px;"></td>
            <td style="height: 70px;"></td>
            <td style="height: 70px;"></td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center;font-size: 15pt;">{{Auth::user()->name}}</td>
            <td style="text-align: center;font-size: 15pt;">Hesti Herawati</td>
        </tr>
    </table>
</body>
