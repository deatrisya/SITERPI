<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <title>Laporan Sapi</title>
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
        <td style="border:1px solid #000; text-align: center;padding: 2px; width: 100px; width:100px">
            <!-- <img src="{{asset('admin/images/siterpi.png')}}" alt="logo" /> -->
        </td>
        <td style="border:1px solid #000; text-align: center;padding: 2px; width: 100px; width:500px">
            <h3 align="center">CV DELVINA <br> LAPORAN PETERNAKAN SAPI <br> DATA SAPI </h3>
            <p align="center">Jl. Dusun Kutukan RT.03 RW.05 Dusun Kutukan, Desa Lecari, Sukorejo, Lecari Kutuk'an,
                    Lecari, Kec. Sukorejo, Pasuruan, Jawa Timur 67161</p>
        </td>
    </table>

    <br>

    <table style="border-collapse:collapse;" align="center"> 
        <thead border="0px">
            <tr>
                <th style="border:1px solid #000; text-align: center;padding: 3px; width: 20px;">No</th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 50px;">Jenis Sapi</th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 30px;">NIS</th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 50px;">Tanggal Lahir</th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 50px;">Umur</th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 40px;">Status Umur</th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 50px;">Status</th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 40px;">Jenis Kelamin</th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 40px;">Status Asal</th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 30px;">Bobot</th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 30px;">Harga</th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 40px;">Kondisi</th>
                <th style="border:1px solid #000; text-align: center;padding: 2px; width: 60px;">Keterangan</th>
            </tr>
        </thead>
        <tbody class='table'>
            @foreach($sapi as $s)
            <tr>
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 20px;">{{$loop->iteration}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 20px;">{{$s->jenissapi->jenis_sapi}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 20px;">{{$s->nis}}</td>            
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 20px;">{{$s->tanggal_lahir}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 20px;">{{$s->umur}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 20px;">{{$s->status_umur}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 20px;">{{!! $s->statussapi !!}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 20px;">{{$s->jenis_kelamin}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 20px;">{{$s->status_asal}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 20px;">{{$s->bobot}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 20px;">{{$s->harga}}</td>
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 20px;">{{$s->kondisi}}</td>              
                <td style="border:1px solid #000; text-align: center;padding: 2px; width: 20px;">{{$s->keterangan}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>

</html>