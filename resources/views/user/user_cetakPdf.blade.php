<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <table class="table" style="border: 1px solid:black">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Gender</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Alamat</th>
            <th scope="col">Jabatan</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($user as $data)
            {{-- {{dd($user)}} --}}
             <tr>

                <td>{{$loop->iteration}}</td>
                <td>{{$data->nama}}</td>
                <td>{{$data->username}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->jenis_kelamin}}</td>
                <td>{{$data->tanggal_lahir}}</td>
                <td>{{$data->alamat}}</td>
                <td>{{$data->jabatan}}</td>
             </tr>
            @endforeach
        </tbody>
      </table>
</body>
</html>
