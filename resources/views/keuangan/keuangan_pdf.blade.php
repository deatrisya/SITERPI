<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Keuangan</title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}

</head>

<body>
    <div
        style="overflow: border: 1px solid #000; margin: auto; padding: 30px; width: 90%; background-color: none;">
        <style type="text/css">
            table tr td,
            table tr th {
                font-size: 10pt;
            }

        </style>
        <table align="center" style="border-collapse:collapse;">
            <td style="border-bottom:2px solid #000; text-align: center;padding: 2px; width: 100px; width:100px">
                {{-- <img src="{{asset('admin/images/logo-siterpi.png')}}" alt=""> --}}
                {{-- <img src="<?php echo 'public/images/logo-siterpi.png'; ?>" alt=""> --}}
                {{-- <img src="public/images/logo-siterpi.png"> --}}
                <img src="{{ public_path("admin/images/logo-siterpi.png") }}" alt="" style="width: 150px; height: 150px;">
                {{-- <img src="'.base_url().'public/images/logo-siterpi.png" width=100 height=100/> --}}
                {{-- @php
                    $image = $keuangan->logo;
                    $imageData = base64_encode(file_get_contensts($image));
                    $src = 'data:' .nine_content_type($image) . ';base64' .imageData;
                @endphp
                <img src="{{$src}}" alt="" style="width: 150px; height: 150px;"> --}}

            </td>
            <td style="border-bottom:2px solid #000; text-align: center;padding: 2px; width: 100px; width:500px">
                <h3 align="center">CV. DELVINA <br> LAPORAN PETERNAKAN SAPI </h3>
                <p align="center">Jl. Dusun Kutukan Timur RT.03 RW.05 Dusun Kutuan Timur, Desa Lecari, Kec. Sukorejo, Kab. Pasuruan, Jawa Timur 67161
                    <br>
                    Telepon: (031) 89216, Email : cvdelvina@gmail.com
                </p>
            </td>

        </table>

        <h4 align="center">LAPORAN DATA KEUANGAN</h4>
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
                <th style="border:1px solid #000; text-align: center;padding: 3px; width: 20px; background-color: rgb(197, 197, 197);">No</th>
                <th style="border:1px solid #000; text-align: center;padding: 3px; width: 20px; background-color: rgb(197, 197, 197);">Tanggal</th>
                <th style="border:1px solid #000; text-align: center;padding: 3px; width: 20px; background-color: rgb(197, 197, 197);">Tipe</th>
                <th style="border:1px solid #000; text-align: center;padding: 3px; width: 20px; background-color: rgb(197, 197, 197);">Tipe ID</th>
                <th style="border:1px solid #000; text-align: center;padding: 3px; width: 20px; background-color: rgb(197, 197, 197);">Masuk (Rp.)</th>
                <th style="border:1px solid #000; text-align: center;padding: 3px; width: 20px; background-color: rgb(197, 197, 197);">Keluar (Rp.)</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($keuangan as $data)
                <tr>
                    <td style="border:1px solid #000; text-align: center;padding: 3px; width: 30px;">{{$loop->iteration}}</td>
                    <td style="border:1px solid #000; text-align: center;padding: 3px; width: 150px;">{{date('d F Y', strtotime($data->tanggal))}}</td>
                    <td style="border:1px solid #000; text-align: center;padding: 3px; width: 150px;">{{$data->tipe}}</td>
                    <td style="border:1px solid #000; text-align: center;padding: 3px; width: 50px;">{{$data->tipeID}}</td>
                    <td style="border:1px solid #000; text-align: right;padding: 3px; width: 110px;">{{number_format($data->masuk),2}},00</td>
                    <td style="border:1px solid #000; text-align: right;padding: 3px; width: 110px;">{{number_format($data->keluar),2}},00</td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</body>

</html>
