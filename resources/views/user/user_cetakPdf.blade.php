<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data User</title>
</head>
<body>
    <div style="overflow: border: 1px solid #000; margin: 20px ; padding: 20px; width: 80%; background-color: none;">
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
            <td style="border-bottom:2px solid #000; text-align: center;padding: 2px; width: 200px; width:800px">
                <h3 align="center">CV. DELVINA <br> LAPORAN PETERNAKAN SAPI </h3>
                <p align="center">Jl. Dusun Kutukan Timur RT.03 RW.05 , Desa Lecari, Kec. Sukorejo, Kab. Pasuruan, Jawa Timur 67161
                    <br>
                    Telepon: (031) 89216, Email : cvdelvina@gmail.com, Website : cvdelvina.co.id
                </p>
            </td>

        </table>

        <h4 style="text-align: center;" > LAPORAN DATA USER</h4>
        <p style="text-indent :5em;"> <b>Tanggal </b> :
            @php
                echo date(' d F Y');
            @endphp </p>

        <p style="text-indent :5em;"> <b>Waktu </b>   :
        @php
            date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
            echo date('h:i:s a'); // menampilkan jam sekarang
        @endphp </p>
        <table align="center" style="border-collapse:collapse;">
            <thead>
                <tr>
                  <th style="border:1px solid #000; text-align: center;padding: 3px; width: 20px; background-color: rgb(197, 197, 197);">No</th>
                  <th style="border:1px solid #000; text-align: center;padding: 3px; width: 20px; background-color: rgb(197, 197, 197);">Nama</th>
                  <th style="border:1px solid #000; text-align: center;padding: 3px; width: 20px; background-color: rgb(197, 197, 197);">Username</th>
                  <th style="border:1px solid #000; text-align: center;padding: 3px; width: 20px; background-color: rgb(197, 197, 197);">Email</th>
                  <th style="border:1px solid #000; text-align: center;padding: 3px; width: 20px; background-color: rgb(197, 197, 197);">Gender</th>
                  <th style="border:1px solid #000; text-align: center;padding: 3px; width: 20px; background-color: rgb(197, 197, 197);">Tanggal Lahir</th>
                  <th style="border:1px solid #000; text-align: center;padding: 3px; width: 20px; background-color: rgb(197, 197, 197);">Alamat</th>
                  <th style="border:1px solid #000; text-align: center;padding: 3px; width: 20px; background-color: rgb(197, 197, 197);">Jabatan</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($user as $data)
                  {{-- {{dd($user)}} --}}
                   <tr>

                      <td style="border:1px solid #000; text-align: center;padding: 3px; width: 40px;">{{$loop->iteration}}</td>
                      <td style="border:1px solid #000; text-align: center;padding: 3px; width: 120px;">{{$data->nama}}</td>
                      <td style="border:1px solid #000; text-align: center;padding: 3px; width: 100px;">{{$data->username}}</td>
                      <td style="border:1px solid #000; text-align: center;padding: 3px; width: 180px;">{{$data->email}}</td>
                      <td style="border:1px solid #000; text-align: center;padding: 3px; width: 80px;">{{$data->jenis_kelamin}}</td>
                      <td style="border:1px solid #000; text-align: center;padding: 3px; width: 120px;">{{date('d F Y', strtotime($data->tanggal_lahir))}}</td>
                      <td style="border:1px solid #000; text-align: center;padding: 3px; width: 160px;">{{$data->alamat}}</td>
                      <td style="border:1px solid #000; text-align: center;padding: 3px; width: 90px;">{{$data->jabatan}}</td>
                   </tr>
                  @endforeach
              </tbody>
            </table>
    </div>
</body>
</html>
