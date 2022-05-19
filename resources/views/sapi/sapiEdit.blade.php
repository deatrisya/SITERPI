@extends('layouts.app')
@section('title')
    Edit Data Sapi
@endsection
@section('content')
    <div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-orange text-white">Edit Data Sapi</h5>
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
              <form method="POST" action="{{route('sapi.update',$sapi->id)}}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Sapi</label>
                            <select class="form-control" id="jenissapi" name="jenissapi_id" required>
                                @foreach ($jenissapi as $data)
                                    <option value="{{$data->id}}" @if ($data->id == $sapi->jenissapi_id)   selected @endif>{{$data->jenis_sapi}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">NIS</label>
                            <input type="text" class="form-control" id="nis" name="nis" required value="{{$sapi->nis}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required value="{{$sapi->tanggal_lahir}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Kondisi</label>
                            <select class="form-control" id="kondisi" name="kondisi" required>
                                <option value="Sehat" @if ($sapi->kondisi == "Sehat")selected @endif>Sehat</option>
                                <option value="Sakit" @if ($sapi->kondisi == "Sakit")selected @endif>Sakit</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" disabled>{{$sapi->keterangan}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label">Jenis Kelamin</label >
                           <div class="row">
                            <div class="col-sm-6">
                                <div class="form-radio">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="jenis_kelamin" id="jantan" value="Jantan" {{($sapi->jenis_kelamin=="Jantan") ? 'checked' : ""}}> Jantan
                                  </label>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-radio">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="jenis_kelamin" id="betina" value="Betina" {{($sapi->jenis_kelamin=="Betina") ? 'checked' : ""}}> Betina
                                  </label>
                                </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Bobot</label>
                            <input type="number" class="form-control" id="bobot" name="bobot" required value="{{$sapi->bobot}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" required value="{{$sapi->harga}}">
                        </div>

                        {{-- <div class="form-group">
                            <label for="exampleInputPassword1">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="Terjual" @if ($sapi->status=="Terjual")selected @endif>Terjual</option>
                                <option value="Belum Terjual"  @if ($sapi->status=="Belum Terjual")selected @endif>Belum Terjual</option>

                            </select>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="exampleInputPassword1">Status Asal</label>
                            <select class="form-control" id="status_asal" name="status_asal" required>
                                <option value="Beli" @if ($sapi->status_asal = "Beli")selected @endif>Beli</option>
                                <option value="Ternak" @if ($sapi->status_asal = "Ternak")selected @endif>Ternak</option>
                            </select>
                        </div> --}}
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
