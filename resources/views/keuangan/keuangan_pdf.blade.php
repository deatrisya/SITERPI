<!DOCTYPE html>
<html>

<head>
    <title>Laporan Keuangan</title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
</head>

<body>
    <div
        style="overflow: margin: auto; padding: 30px; width: 90%;">
        <style type="text/css">
            table tr td,
            table tr th {
                font-size: 9pt;
            }

        </style>
        <table align="center" class="table" border="1">
            <td width="100px">
                {{-- <img src="{{asset('admin/images/logo-siterpi.png')}}" alt=""> --}}
            </td>
            <td width="500px">
                <h3 align="center">CV DELVINA <br> LAPORAN PETERNAKAN SAPI </h3>
                <p align="center">Jl. Dusun Kutukan RT.03 RW.05 Dusun Kutukan, Desa Lecari, Sukorejo, Lecari Kutuk'an,
                    Lecari, Kec. Sukorejo, Pasuruan, Jawa Timur 67161</p>
            </td>
        </table>

        <br>

        <table class="table" align="center" border="1">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Tipe</th>
                <th scope="col">Tipe ID</th>
                <th scope="col">Masuk</th>
                <th scope="col">Keluar</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($keuangan as $data)
                <tr>
                    <td align="center" scope="row" width="20px">{{$loop->iteration}}</td>
                    <td align="center" width="105px">{{$data->tanggal}}</td>
                    <td align="center" width="150px">{{$data->tipe}}</td>
                    <td align="center" width="50px">{{$data->tipeID}}</td>
                    <td align="center" width="125px">{{$data->masuk}}</td>
                    <td align="center" width="125px">{{$data->keluar}}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</body>

</html>
