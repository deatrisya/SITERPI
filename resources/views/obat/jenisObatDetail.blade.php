@extends('layouts.app')
@section('title')
    Detail Obat
@endsection
@section('content')
    <div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-orange text-white">Detail Obat</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Obat</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nama Obat" name="nama_obat" readonly value="{{$jenis->nama_obat}}">
                          </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>
                <a class="btn btn-secondary" href="{{ route('jenisobat.index')}}">Back</a>
            </div>
          </div>
    </div>
@endsection
