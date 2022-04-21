@extends('layouts.adminLayout')
@section('title')
User Data | SITERPI
@endsection
@section('content')
<div class="table">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    {{-- <th scope="col" width="5%">Password</th> --}}
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Aksi</th>

                </tr>
            </thead>
            @foreach ($user as $data)
            <tbody>
                <tr>
                    <td scope="row">{{$data->id}}</td>
                    <td>{{$data->nama}}</td>
                    <td>{{$data->username}}</td>
                    {{-- <td>{{$data->password}}</td> --}}
                    <td>{{$data->email}}</td>
                    <td>{{$data->jenis_kelamin}}</td>
                    <td>{{$data->tanggal_lahir}}</td>
                    <td>{{$data->alamat}}</td>
                    <td>{{$data->jabatan}}</td>
                    <td>
                        <form action="{{ route('user.destroy',  $data->id) }}" method="POST">
                            <a class="btn btn-info" href="{{route('user.show', $data->id)}}">Show</a> <br> <br>
                            @if (auth()->user()->jabatan=='Admin')
                            <a class="btn btn-primary" href="{{route('user.edit', $data->id)}}">Edit</a> <br> <br>
                            @endif
                            @csrf
                            @method('DELETE')
                            @if (auth()->user()->jabatan=='Admin')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            @endif
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection
