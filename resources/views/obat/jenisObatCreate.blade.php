@extends('layouts.app')
@section('title')
    Tambah Jenis Obat
@endsection
@section('content')
    <div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-orange text-white">Tambah Jenis Obat</h5>
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
              <form method="POST" action="{{route('jenisobat.store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Obat</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nama Obat" name="nama_obat" required>
                          </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>
                <button type="submit" class="btn btn-orange">Submit</button>
                <a class="btn btn-secondary" href="{{ route('jenisobat.index')}}">Cancel</a>
            </form>
            </div>
          </div>
    </div>
@endsection
