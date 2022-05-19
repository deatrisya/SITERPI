@extends('layouts.app')
@section('title')
    Edit Data Sapi
@endsection
@section('content')
    <div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-orange text-white">Detail Data Sapi</h5>
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
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Sapi</label>
                            <input type="text" class="form-control" id="nis" name="nis" disabled value="{{$sapi->jenissapi->jenis_sapi}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">NIS</label>
                            <input type="text" class="form-control" id="nis" name="nis" readonly value="{{$sapi->nis}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" readonly value="{{$sapi->tanggal_lahir}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Kondisi</label>
                            <select class="form-control" id="kondisi" name="kondisi" disabled>
                                <option value="Sehat" @if ($sapi->kondisi == "Sehat")selected @endif>Sehat</option>
                                <option value="Sakit" @if ($sapi->kondisi == "Sakit")selected @endif>Sakit</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" readonly rows="3">{{$sapi->keterangan}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label">Jenis Kelamin</label >
                           <div class="row">
                            <div class="col-sm-6">
                                <div class="form-radio">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="jenis_kelamin" id="jantan" value="Jantan" {{($sapi->jenis_kelamin=="Jantan") ? 'checked' : ""}} disabled> Jantan
                                  </label>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-radio">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="jenis_kelamin" id="betina" value="Betina" {{($sapi->jenis_kelamin=="Betina") ? 'checked' : ""}} disabled> Betina
                                  </label>
                                </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Bobot</label>
                            <input type="number" class="form-control" id="bobot" name="bobot" readonly value="{{$sapi->bobot}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" readonly value="{{$sapi->harga}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Status</label>
                            <select class="form-control" id="status" name="status" disabled >
                                <option value="Terjual" @if ($sapi->status=="Terjual")selected @endif>Terjual</option>
                                <option value="Belum Terjual"  @if ($sapi->status=="Belum Terjual")selected @endif>Belum Terjual</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Status Asal</label>
                            <input type="text" class="form-control" id="status_asal" name="status_asal" readonly value="{{$sapi->status_asal}}">
                        </div>
                    </div>
                </div>
                <a class="btn btn-secondary" href="{{ route('sapi.index')}}">Back</a>

         </div>
        </div>
    </div>
@endsection
