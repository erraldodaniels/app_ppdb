<?php
$file_name ="LaporanKoperasi_".$tanggal.".xls";

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file_name");

?>
<body>
<table border="1">
    <thead>
        <tr width="50">
            <td colspan="3" style="font-size: 15pt;"><center><b>Laporan Penjualan</b></center></td>
        </tr>
        <tr width="50">
            <td colspan="3" style="font-size: 15pt;"><center><b>Koperasi Serba Usaha<b></center></td>
        </tr>
        <tr>
            <td>Kasir: </td>
            <td colspan="2" style="text-align:left;padding-left: 5px;">{{Auth::user()->name}}</td>
        </tr>
        <tr>
            <td>Tanggal: </td>
            <td colspan="2" style="text-align:left;padding-left: 5px;">{{date('d-m-Y')}}</td>
        </tr>
    </thead>
    <tbody style="border-width: 3px;">
        <tr>
            <th>No.</th>
            <th style="width: 200px;">Nama Pembeli</th>
            <th style="width: 200px;">Total Pembelian</th>
        </tr>

        @foreach ($laporan as $num => $item)
        <tr>
            <td style="text-align: center;">{{$num+1}}</td>
            <td style="padding-left: 5px;">{{$item->nama_customer}}</td>
            <td>Rp. {{$item->total_harga}}</td>
        </tr>
        @endforeach
    </tbody>
        <tr></tr>
        <tr>
            <td colspan="2" style="text-align: right;padding-right: 9px;">Total Transaksi : </td>
            <td>Rp. {{$total_transaksi}}</td>
        </tr>
        @foreach ($keuntungan_current as $num => $untung)
        <tr>
            <td colspan="2" style="text-align: right;padding-right: 9px;">Keuntungan : </td>
            <td>Rp. {{$untung->jumlah_keuntungan}}</td>
        </tr>
        @endforeach
        <tr></tr>
        <tr>
            <td></td>
            <td style="text-align: center;width:70px;">Kasir</td>
            <td style="text-align: center;">Kepala Koperasi</td>
        </tr>
        <tr>
            <td style="height: 70px;"></td>
            <td style="height: 70px;"></td>
            <td style="height: 70px;"></td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center;">{{Auth::user()->name}}</td>
            <td style="text-align: center;">Hesti Herawati</td>
        </tr>
    </table>
</body>
