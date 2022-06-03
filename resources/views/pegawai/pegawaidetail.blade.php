@extends('layouts.app')
@section('title')
    Detail Data Pegawai
@endsection
@section('content')
    <div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-orange text-white">Detail Data Pegawai</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">NIP</label>
                            <input type="text" class="form-control" id="nip" name="nip" readonly value="{{$pegawai->nip}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Foto Pegawai</label><br>
                            <img width="120px" height="180" src="{{ asset('storage/' . $pegawai->foto_pegawai) }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{$pegawai->nama}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" readonly value="{{$pegawai->jenis_kelamin}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{$pegawai->tempat_lahir}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal Lahir</label>
                            <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{$pegawai->tanggal_lahir}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" readonly value="{{$pegawai->alamat}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">No Telepon</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{$pegawai->no_telp}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{$pegawai->jabatan}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jam Kerja</label>
                            <input type="text" class="form-control" id="jam_kerja" name="jam_kerja" value="{{$pegawai->jam_kerja}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Gaji</label>
                            <input type="text" class="form-control" id="gaji" name="gaji" value="{{$pegawai->gaji}}" readonly>
                        </div>
                    </div>
                </div>
                <a class="btn btn-secondary" href="{{ route('pegawai.index')}}">Back</a>

         </div>
        </div>
    </div>
@endsection