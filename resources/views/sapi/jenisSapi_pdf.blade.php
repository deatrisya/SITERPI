<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <title>Laporan Jenis Sapi</title>
</head>

<body>
<div style="overflow: border: 1px solid #000; margin: auto; padding: 30px; width: 90%; background-color: none;">
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 10pt;
        }
    </style>
    <table align="center" style="border-collapse:collapse;">
        <td style="border-bottom:2px solid #000; text-align: center;padding: 2px; width: 100px; width:100px">
            <img src="{{ public_path("admin/images/logo-siterpi.png") }}" alt="" style="width: 150px; height: 150px;">
        </td>
        <td style="border-bottom:2px solid #000; text-align: center;padding: 2px; width: 100px; width:500px">
            <h3 align="center">CV. DELVINA <br> LAPORAN PETERNAKAN SAPI </h3>
            <p align="center">Jl. Dusun Kutukan Timur RT.03 RW.05 Dusun Kutuan Timur, Desa Lecari, Kec. Sukorejo, Kab. Pasuruan, Jawa Timur 67161
                <br>
                Telepon: (031) 89216, Email : cvdelvina@gmail.com
            </p>
        </td>
    </table>

    <h4 align="center">LAPORAN DATA JENIS SAPI</h4>
    <p style="text-indent :5em;"> <b>Tanggal</b> &nbsp; :
        @php
            echo date(' d F Y');
        @endphp </p>

    <p style="text-indent :5em;"> <b>Waktu</b> &nbsp;&nbsp;&nbsp;    :
    @php
        date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
        echo date('h:i:s a'); // menampilkan jam sekarang
    @endphp </p>

    <table style="border-collapse:collapse;" align="center">
        <thead>
            <tr>
                <th style="border:1px solid #000; text-align: center;padding: 4px; width: 40px;background-color: rgb(197, 197, 197);">No</th>
                <th style="border:1px solid #000; text-align: center;padding: 4px; width: 500px;background-color: rgb(197, 197, 197);">Jenis Sapi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jenisSapi as $j)
            <tr>
                <td style="border:1px solid #000; text-align: center;padding: 4px; width: 40px;">{{$j->id}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 4px; width: 500px">{{$j->jenis_sapi}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>

</html>
