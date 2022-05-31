@extends('layouts.app')
@section('title')
Edit Jenis Obat
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
    <div class="card ">
        <h5 class="card-header bg-orange text-white">Edit Jenis Obat</h5>
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
            <form method="POST" action="{{route('jenisobat.update',$jenis->id)}}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Obat</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nama Obat"
                                name="nama_obat" required value="{{$jenis->nama_obat}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Satuan</label>
                            <select class="form-control" name="satuan" id="satuan">
                                <option value="ml" @if ($jenis->satuan == 'ml' )selected @endif>Mililiter</option>
                                <option value="l" @if ($jenis->satuan == 'l' )selected @endif>Liter</option>
                                <option value="pcs" @if ($jenis->satuan == 'pcs' )selected @endif>Pcs</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga</label>
                            <input type="number" class="form-control" aria-describedby="emailHelp"
                                placeholder="Rp 10000" name="harga" required value="{{$jenis->harga}}">
                        </div>
                    </div>
                </div>
                    <button type="submit" class="btn btn-orange">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('jenisobat.index')}}">Cancel</a>
            </form>
        </div>
    </div>
</div>

@endsection
