@extends('layouts.app')
@section('title')
    Detail Riwayat Obat
@endsection
@section('content')
    <div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-orange text-white">Detail Riwayat Obat</h5>
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
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Obat</label>
                            <input type="text" class="form-control" id="nama_obat" name="nama_obat" disabled value="{{$riwayatobat->obat->nama_obat}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Isi</label>
                            <input type="text" class="form-control" id="isi" name="isi" readonly value="{{$riwayatobat->isi}} ml">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Status</label>
                            <input type="text" class="form-control" id="status" name="status" readonly value="{{$riwayatobat->status}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jumlah Unit</label>
                            <input type="text" class="form-control" id="jumlah_unit" name="jumlah_unit" readonly value="{{$riwayatobat->jumlah_unit}} Buah">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Harga Satuan</label>
                            <input type="text" class="form-control" id="harga_satuan" name="harga_satuan" readonly value="Rp. {{$riwayatobat->harga_satuan}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Total Harga</label>
                            <input type="text" class="form-control" id="total_harga" name="total_harga" readonly value="Rp. {{$riwayatobat->total_harga}}">
                        </div>
                    </div>
                </div>
                <a class="btn btn-secondary" href="{{ route('riwayatobat.index')}}">Back</a>

         </div>
        </div>
    </div>
@endsection
