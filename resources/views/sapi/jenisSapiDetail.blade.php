@extends('layouts.app')
@section('title')
    Edit Jenis Sapi
@endsection
@section('content')
    <div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-orange text-white">Edit Jenis Sapi</h5>
            <div class="card-body">
              <form method="POST" action="{{route('jenissapi.update',$jenis->id)}}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Jenis</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nama Jenis" name="jenis_sapi" readonly value="{{$jenis->jenis_sapi}}">
                          </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>
                <a class="btn btn-secondary" href="{{ route('jenissapi.index')}}">Back</a>
            </form>
            </div>
          </div>
    </div>
@endsection
