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
                            <label for="exampleInputEmail1">ID Sapi</label>
                            <input type="text" class="form-control" id="sapi_id" name="sapi_id" readonly value="{{$transaksi->sapi->nis}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Status Transaksi</label>
                            <input type="text" class="form-control" value="{{$transaksi->status_transaksi}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" value="{{$transaksi->harga}}" readonly></input>
                        </div>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
                <a class="btn btn-secondary" href="{{ route('transaksi.index')}}">Back</a>

         </div>
        </div>
    </div>
@endsection