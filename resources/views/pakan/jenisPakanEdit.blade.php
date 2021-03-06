@extends('layouts.app')
@section('title')
    Edit Jenis Pakan
@endsection
@section('content')
    <div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-orange text-white">Edit Jenis Pakan</h5>
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
              <form method="POST" action="{{route('jenispakan.update',$pakan->id)}}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Pakan</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Jenis Pakan" name="jenis_pakan" required value="{{$pakan->jenis_pakan}}">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga Pakan</label>
                            <input type="number" class="form-control" aria-describedby="emailHelp" placeholder="Rp 10.000" name="harga" required value="{{$pakan->harga}}">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-orange">Edit</button>
                <a class="btn btn-secondary" href="{{ route('jenispakan.index')}}">Cancel</a>
            </form>
            </div>
          </div>
    </div>
@endsection
