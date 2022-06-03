@extends('layouts.app')
@section('title')
    Detail Data User
@endsection
@section('content')
    <div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-orange text-white">Detail Data User</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Foto</label><br>
                            <img width="120px" height="180px" src="{{ asset('storage/' . $user->foto) }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{$user->nama}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" id="username" name="username" readonly value="{{$user->username}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">No HP</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{$user->no_hp}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="{{$user->jenis_kelamin}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal Lahir</label>
                            <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{$user->tanggal_lahir}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" readonly value="{{$user->alamat}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{$user->jabatan}}" readonly>
                        </div>
                    </div>
                </div>
                <a class="btn btn-secondary" href="{{ route('user.index')}}">Back</a>
         </div>
        </div>
    </div>
@endsection
