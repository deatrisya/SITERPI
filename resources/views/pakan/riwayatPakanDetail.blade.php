@extends('layouts.app')
@section('title')
    Detail Riwayat Pakan
@endsection
@section('content')
    <div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-orange text-white">Detail Riwayat Pakan</h5>
            <div class="card-body">
              @if ($errors->any())
              <div class="alert alert-danger">
                <strong>Whoops!</strong>There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
              </div>

              @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Pakan</label>
                            <input type="text" class="form-control" id="pakan" name="pakan" disabled value="{{$riwayatpakan->pakan->jenis_pakan}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" readonly value="{{$riwayatpakan->tanggal}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Status</label>
                            <input type="text" class="form-control" disabled value="{{$riwayatpakan->status}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Waktu</label>
                            <input type="text" class="form-control" disabled value="{{$riwayatpakan->waktu}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jumlah</label>
                            <input type="text" class="form-control" id="jumlah" name="jumlah" readonly value="{{$riwayatpakan->jumlah}} Kg">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Harga Satuan</label>
                            <input type="text" class="form-control" id="harga_satuan" name="harga_satuan" readonly value="Rp. {{$riwayatpakan->harga_satuan}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Total Harga</label>
                            <input type="text" class="form-control" id="total_harga" name="total_harga" readonly value="Rp. {{$riwayatpakan->total_harga}}">
                        </div>
                    </div>
                </div>
                <a class="btn btn-secondary" href="{{ route('riwayatpakan.index')}}">Back</a>

         </div>
        </div>
    </div>
@endsection
