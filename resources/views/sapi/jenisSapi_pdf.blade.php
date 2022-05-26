<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <title>Laporan Jenis Sapi</title>
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
            <h3 align="center">CV DELVINA <br> LAPORAN PETERNAKAN SAPI <br> DATA JENIS SAPI </h3>
            <p align="center">Jl. Dusun Kutukan RT.03 RW.05 Dusun Kutukan, Desa Lecari, Sukorejo, Lecari Kutuk'an,
                    Lecari, Kec. Sukorejo, Pasuruan, Jawa Timur 67161</p>
        </td>
    </table>

    <br>

    <table style="border-collapse:collapse;" align="center"> 
        <thead>
            <tr>
                <th style="border:1px solid #000; text-align: center;padding: 4px; width: 100px;">No</th>
                <th style="border:1px solid #000; text-align: center;padding: 4px; width: 500px;">Jenis Sapi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jenisSapi as $j)
            <tr>
                <td style="border:1px solid #000; text-align: center;padding: 4px; width: 100px;">{{$j->id}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 4px; width: 500px">{{$j->jenis_sapi}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>

</html>