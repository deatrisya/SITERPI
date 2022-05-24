@extends('layouts.app')
@section('title')
    Detail Data Keuangan
@endsection
@section('content')
    <div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-orange text-white">Detail Data Keuangan</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID</label>
                            <input type="text" class="form-control" id="id" name="id" readonly value="{{$keuangan->id}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal</label>
                            <input type="text" class="form-control" id="tanggal" name="tanggal" value="{{$keuangan->tanggal}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tipe</label>
                            <select class="form-control" id="tipe" name="tipe" disabled>
                                <option value="Transaksi" @if ($keuangan->tipe == "Transaksi")selected @endif>Transaksi</option>
                                <option value="Obat" @if ($keuangan->tipe == "Obat")selected @endif>Obat</option>
                                <option value="Pakan" @if ($keuangan->tipe == "Pakan")selected @endif>Pakan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">TipeID</label>
                            <input type="number" class="form-control" id="tipeID" name="tipeID" value="{{$keuangan->tipeID}}" readonly></input>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Masuk</label>
                            <input type="number" class="form-control" id="masuk" name="masuk" value="{{$keuangan->masuk}}" readonly></input>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Keluar</label>
                            <input type="number" class="form-control" id="keluar" name="keluar" value="{{$keuangan->keluar}}" readonly></input>
                        </div>
                    </div>
                </div>
                <a class="btn btn-secondary" href="{{ route('keuangan.index')}}">Back</a>
         </div>
        </div>
    </div>
@endsection
