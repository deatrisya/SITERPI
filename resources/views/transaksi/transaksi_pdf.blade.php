<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <title>Laporan Transaksi</title>
</head>

<body>
<div style="overflow: auto; border: 1px solid #000; margin: auto; padding: 30px; width: 90%; background-color: none;">
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <table style="border-collapse:collapse;" align="center">
        <td style="border:1px solid #000; text-align: center;padding: 4px; width: 100px; width:100px">
            <!-- <img src="{{asset('admin/images/siterpi.png')}}" alt="logo" /> -->
        </td>
        <td style="border:1px solid #000; text-align: center;padding: 4px; width: 100px; width:500px">
            <h3 align="center">CV DELVINA <br> LAPORAN PETERNAKAN SAPI <br> DATA TRANSAKSI </h3>
            <p align="center">Jl. Dusun Kutukan RT.03 RW.05 Dusun Kutukan, Desa Lecari, Sukorejo, Lecari Kutuk'an,
                    Lecari, Kec. Sukorejo, Pasuruan, Jawa Timur 67161</p>
        </td>
    </table>

    <br>

    <table style="border-collapse:collapse;" align="center"> 
        <thead>
            <tr>
                <th style="border:1px solid #000; text-align: center;padding: 4px; width: 100px;">No</th>
                <th style="border:1px solid #000; text-align: center;padding: 4px; width: 100px;">ID Sapi</th>
                <th style="border:1px solid #000; text-align: center;padding: 4px; width: 120px;">Status Transaksi</th>
                <th style="border:1px solid #000; text-align: center;padding: 4px; width: 100px;">Harga</th>
                <th style="border:1px solid #000; text-align: center;padding: 4px; width: 150px;">Tanggal Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi as $t)
            <tr>
                <td style="border:1px solid #000; text-align: center;padding: 4px; width: 100px;">{{$loop->iteration}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 4px; width: 100px;">{{$t->sapi->nis}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 4px; width: 120px;">{{$t->status_transaksi}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 4px; width: 100px;">{{$t->harga}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 4px; width: 150px;">{{$t->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>

</html>