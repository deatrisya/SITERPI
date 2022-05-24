@extends('layouts.app')
@section('title')
    Detail Pakan
@endsection
@section('content')
    <div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-orange text-white">Detail Pakan</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Pakan</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Jenis Pakan" name="jenis_pakan" readonly value="{{$pakan->jenis_pakan}}">
                          </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>
                <a class="btn btn-secondary" href="{{ route('jenispakan.index')}}">Back</a>
            </div>
          </div>
    </div>
@endsection
