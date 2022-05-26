@extends('layouts.app')
@section('title')
    Tambah Riwayat Pakan
@endsection
@section('content')
    <div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-orange text-white">Tambah Riwayat Pakan</h5>
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
              <form method="POST" action="{{route('riwayatpakan.store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis pakan</label>
                            <select class="form-control" id="jenispakan" name="pakan_id" required>
                                @foreach ($jenispakan as $data)
                                    <option value="{{$data->id}}">{{$data->jenis_pakan}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('pakan_id'))
                             <div class="error">{{ $errors->first('pakan_id') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required value="{{old('tanggal')}}" placeholder="Tanggal">
                            @if ($errors->has('tanggal'))
                                <div class="error">{{ $errors->first('tanggal') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="Masuk">Masuk</option>
                                <option value="Keluar">Keluar</option>
                            </select>
                            @if ($errors->has('status'))
                                <div class="error">{{ $errors->first('status') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Waktu</label>
                            <select class="form-control" id="waktu" name="waktu" rows="3" disabled>
                                <option value="Pagi">Pagi</option>
                                <option value="Siang">Siang</option>
                                <option value="Sore">Sore</option>
                                {{old('waktu')}}
                            </select>
                            @if ($errors->has('waktu'))
                                <div class="error">{{ $errors->first('waktu') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" required value="{{old('jumlah')}}" placeholder="Jumlah">
                            @if ($errors->has('jumlah'))
                                <div class="error">{{ $errors->first('jumlah') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Harga Satuan</label>
                            <input type="number" class="form-control" id="harga_satuan" name="harga_satuan" required value="{{old('harga_satuan')}}" placeholder="Harga Satuan">
                            @if ($errors->has('harga_satuan'))
                                <div class="error">{{ $errors->first('harga_satuan') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Total Harga</label>
                            <input type="number" class="form-control" id="total_harga" name="total_harga" required value="{{old('total_harga')}}" placeholder="Total harga">
                            @if ($errors->has('total_harga'))
                                <div class="error">{{ $errors->first('total_harga') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-orange">Submit</button>
                <a class="btn btn-secondary" href="{{ route('riwayatpakan.index')}}">Cancel</a>
            </form>

         </div>
        </div>
    </div>
@endsection
@section('js')
<script type="text/javascript">
    $(function(){
        $("#status").change(function () {
            if ($(this).val() == 'Keluar') {
                $("#waktu").removeAttr("disabled");
                $("#waktu").focus();
            } else {
                $("#waktu").attr("disabled", "disabled");
            }
        });
    });
</script>
@endsection
