<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh Layout 1 Kolom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
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
    <table align="center" border='1'>
        <td width="100px">
            <!-- <img src="{{asset('admin/images/siterpi.png')}}" alt="logo" /> -->
        </td>
        <td width="500px">
            <h3 align="center">Data Jenis Sapi</h3>
            <h3 align="center">SITERPI</h3>
        </td>
    </table>

    <br>

    <table class='table table-bordered' width="75%" border='1' align="center"> 
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Sapi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jenisSapi as $j)
            <tr>
                <td align="center" width="100px">{{$j->id}}</td>
                <td align="center" width="500px">{{$j->jenis_sapi}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>

</html>