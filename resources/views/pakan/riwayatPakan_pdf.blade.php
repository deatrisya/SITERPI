<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <title>Laporan Data Riwayat Pakan</title>
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

    <h4 style="text-align: center;" > LAPORAN DATA RIWAYAT PAKAN</h4>
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
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 50px;background-color: rgb(197, 197, 197);">Jenis Pakan</th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 50px;background-color: rgb(197, 197, 197);">Tanggal</th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 50px;background-color: rgb(197, 197, 197);">Status</th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 40px;background-color: rgb(197, 197, 197);">Waktu</th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 40px;background-color: rgb(197, 197, 197);">Jumlah</th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 30px;background-color: rgb(197, 197, 197);">Harga Satuan (Rp)</th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 30px;background-color: rgb(197, 197, 197);">Total Harga (Rp) </th>
            </tr>
        </thead>
        <tbody class='table'>
            @foreach($riwayatPakan as $data)
            <tr>
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 30px;">{{$loop->iteration}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 150px;">{{$data->pakan->jenis_pakan}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 120px;">{!! date('d M Y',strtotime($data->tanggal)) !!}</td>
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 120px;">{{$data->status}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 100px;">{{$data->waktu}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 90px;">{{$data->jumlah}}/ton</td>
                <td style="border:1px solid #000; text-align: right;padding: 2px; width: 150px;">{{number_format($data->harga_satuan),2}},00</td>
                <td style="border:1px solid #000; text-align: right;padding: 2px; width: 150px;">{{number_format($data->total_harag),2}},00</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>

</html>
