@extends('layouts.app')
@section('title')
    Edit Data Keuangan
@endsection
@section('content')
    <div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-orange text-white">Edit Data Keuangan</h5>
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
              <form method="POST" action="{{route('keuangan.update',$keuangan->id)}}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" required value="{{$keuangan->tanggal}}" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tipe</label>
                            <select class="form-control" id="tipe" name="tipe" required>
                                <option value="Transaksi" @if ($keuangan->tipe == "Transaksi")selected @endif>Transaksi</option>
                                <option value="Obat" @if ($keuangan->tipe == "Obat")selected @endif>Obat</option>
                                <option value="Pakan" @if ($keuangan->tipe == "Pakan")selected @endif>Pakan</option>
                            </select>
                            @if ($errors->has('tipe'))
                            <div class="error">{{ $errors->first('tipe') }}</div>
                        @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tipe ID</label>
                            <input type="text" class="form-control" id="tipeID" name="tipeID" required value="{{$keuangan->tipeID}}" >
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Masuk</label>
                            <input type="text" class="form-control" id="masuk" name="masuk" value="{{$keuangan->masuk}}" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Keluar</label>
                            <input type="number" class="form-control" id="keluar" name="keluar" value="{{$keuangan->keluar}}" >
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
                <button type="submit" class="btn btn-orange">Submit</button>
                <a class="btn btn-secondary" href="{{ route('keuangan.index')}}">Cancel</a>
            </form>

         </div>
        </div>
    </div>
@endsection
