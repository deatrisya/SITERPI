@extends('layouts.app')
@section('title')
    Tambah Sapi
@endsection
@section('content')
    <div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-orange text-white">Tambah Sapi</h5>
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
              <form method="POST" action="{{route('sapi.store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Sapi</label>
                            <select class="form-control" id="jenissapi" name="jenissapi_id" required>
                                @foreach ($jenissapi as $data)
                                    <option value="{{$data->id}}">{{$data->jenis_sapi}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('jenissapi_id'))
                             <div class="error">{{ $errors->first('jenissapi_id') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">NIS</label>
                            <input type="text" class="form-control" id="nis" name="nis" required value="{{old('nis')}}" placeholder="S0001">
                            @if ($errors->has('nis'))
                                <div class="error">{{ $errors->first('nis') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required value="{{old('tanggal_lahir')}}">
                            @if ($errors->has('tanggal_lahir'))
                            <div class="error">{{ $errors->first('tanggal_lahir') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Kondisi</label>
                            <select class="form-control" id="kondisi" name="kondisi" required>
                                <option value="Sehat">Sehat</option>
                                <option value="Sakit">Sakit</option>
                            </select>
                            @if ($errors->has('kondisi'))
                            <div class="error">{{ $errors->first('kondisi') }}</div>
                        @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" disabled>{{old('keterangan')}} </textarea>
                            @if ($errors->has('keterangan'))
                            <div class="error">{{ $errors->first('keterangan') }}</div>
                        @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label">Jenis Kelamin</label >
                           <div class="row">
                            <div class="col-sm-6">
                                <div class="form-radio">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="jenis_kelamin" id="jantan" value="Jantan" checked > Jantan
                                  </label>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-radio">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="jenis_kelamin" id="betina" value="Betina"> Betina
                                  </label>
                                </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Bobot</label>
                            <input type="number" class="form-control" id="bobot" name="bobot" required value="{{old('bobot')}}">
                            @if ($errors->has('bobot'))
                            <div class="error">{{ $errors->first('bobot') }}</div>
                        @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" required value="{{old('harga')}}">
                            @if ($errors->has('harga'))
                            <div class="error">{{ $errors->first('harga') }}</div>
                        @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Status Asal</label>
                            <select class="form-control" id="status_asal" name="status_asal" required>
                                <option value="Beli">Beli</option>
                                <option value="Ternak">Ternak</option>
                            </select>
                            @if ($errors->has('status_asal'))
                            <div class="error">{{ $errors->first('status_asal') }}</div>
                        @endif
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-orange">Submit</button>
                <a class="btn btn-secondary" href="{{ route('sapi.index')}}">Cancel</a>
            </form>

         </div>
        </div>
    </div>
@endsection
@section('js')
<script type="text/javascript">
    $(function(){
        $("#kondisi").change(function () {
            if ($(this).val() == 'Sakit') {
                $("#keterangan").removeAttr("disabled");
                $("#keterangan").focus();
            } else {
                $("#keterangan").attr("disabled", "disabled");
            }
        });
    });
</script>
@endsection
