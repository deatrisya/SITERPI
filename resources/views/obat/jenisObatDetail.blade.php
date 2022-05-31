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
                        <div class="form-group">
                            <label for="exampleInputEmail1">Satuan</label>
                            <select class="form-control" name="satuan" id="satuan" disabled>
                                <option value="ml" @if ($jenis->satuan == 'ml' )selected @endif>Mililiter</option>
                                <option value="l" @if ($jenis->satuan == 'l' )selected @endif>Liter</option>
                                <option value="pcs" @if ($jenis->satuan == 'pcs' )selected @endif>Pcs</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga / Satuan</label>
                            <input type="number" class="form-control" aria-describedby="emailHelp"
                                placeholder="Rp 10000" name="harga" readonly value="{{$jenis->harga}}">
                        </div>
                    </div>
                </div>
                <a class="btn btn-secondary" href="{{ route('jenisobat.index')}}">Back</a>
            </div>
          </div>
    </div>
@endsection
