<?php
$file_name ="LaporanKoperasi_".$tanggal.".xls";

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file_name");

?>
<body>
<table border="1">
        <tr width="50">
            <td colspan="5" style="font-size: 15pt;"><center>Laporan Penjualan</center></td>
        </tr>
        <tr width="50">
            <td colspan="5" style="font-size: 15pt;"><center>Koperasi Serba Usaha</center></td>
        </tr>
        <tr>
            <td>Tanggal: </td>
            <td colspan="4" style="text-align:left;">{{date('d-m-Y')}}</td>
        </tr>
        <tr>
            <th>No.</th>
            <th>Nama Pembeli</th>
            <th>Total Pembelian</th>
            <th>Metode Pembayaran</th>
        </tr>

        @foreach ($laporan as $num => $item)
        <tr>
            <td>{{$num+1}}</td>
            <td>{{$item->nama_customer}}</td>
            <td>{{$item->total_harga}}</td>
            <td>{{$item->metode_bayar}}</td>
        </tr>
        @endforeach
    </table>
</body>
