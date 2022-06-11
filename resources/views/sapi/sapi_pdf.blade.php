<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <title>Laporan Data Sapi</title>
</head>

<body>
<div style="overflow: border: 1px solid #000; margin: 20px ; padding: 20px; width: 80%; background-color: none;">
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 10pt;
        }
    </style>
    <table style="border-collapse:collapse;" align="center">
        <td style="border-bottom:2px solid #000; text-align: center;padding: 2px; width: 100px; width:100px">
            <img src="{{ public_path("admin/images/logo-siterpi.png") }}" alt="" style="width: 150px; height: 150px;">
        </td>
        <td style="border-bottom:2px solid #000; text-align: center;padding: 2px; width: 200px; width:800px">
            <h3 align="center">CV. DELVINA <br> LAPORAN PETERNAKAN SAPI </h3>
                <p align="center">Jl. Dusun Kutukan Timur RT.03 RW.05 , Desa Lecari, Kec. Sukorejo, Kab. Pasuruan, Jawa Timur 67161
                    <br>
                    Telepon: (031) 89216, Email : cvdelvina@gmail.com, Website : cvdelvina.co.id
                </p>
        </td>
    </table>

    <h4 style="text-align: center;" > LAPORAN DATA SAPI</h4>
        <p style="text-indent :5em;"> <b>Tanggal </b> :
            @php
                echo date(' d F Y');
            @endphp </p>

        <p style="text-indent :5em;"> <b>Waktu </b>   :
        @php
            date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
            echo date('h:i:s a'); // menampilkan jam sekarang
        @endphp </p>

    <table style="border-collapse:collapse;" align="center">
        <thead border="0px">
            <tr>
                <th style="border:1px solid #000; text-align: center;padding: 3px; width: 30px;;background-color: rgb(197, 197, 197);">No</th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 50px;background-color: rgb(197, 197, 197);">Jenis Sapi</th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 30px;background-color: rgb(197, 197, 197);">NIS</th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 50px;background-color: rgb(197, 197, 197);">Tanggal Lahir</th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 50px;background-color: rgb(197, 197, 197);">Umur</th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 40px;background-color: rgb(197, 197, 197);">Status Umur</th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 50px;background-color: rgb(197, 197, 197);">Status</th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 40px;background-color: rgb(197, 197, 197);">Jenis Kelamin</th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 40px;background-color: rgb(197, 197, 197);">Status Asal</th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 30px;background-color: rgb(197, 197, 197);">Bobot</th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 30px;background-color: rgb(197, 197, 197);">Harga (Rp.) </th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 40px;background-color: rgb(197, 197, 197);">Kondisi</th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 60px;background-color: rgb(197, 197, 197);">Keterangan</th>
            </tr>
        </thead>
        <tbody class='table'>
            @foreach($sapi as $s)
            <tr>
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 30px;">{{$loop->iteration}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 70px;">{{$s->jenissapi->jenis_sapi}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 50px;">{{$s->nis}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 100px;">{{date('d F Y', strtotime($s->tanggal_lahir))}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 100px;">{{$s->umur}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 50px;">{{$s->status_umur}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 70px;">{{!! $s->statussapi !!}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 60px;">{{$s->jenis_kelamin}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 80px;">{{$s->status_asal}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 40px;">{{$s->bobot}}</td>
                <td style="border:1px solid #000; text-align: right;padding: 2px; width: 100px;">{{number_format($s->harga),2}},00</td>
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 50px;">{{$s->kondisi}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 90px;">{{$s->keterangan}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>

</html>
