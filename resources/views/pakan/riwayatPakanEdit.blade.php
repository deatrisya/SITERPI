@extends('layouts.app')
@section('title')
    Edit Riwayat Obat
@endsection
@section('content')
    <div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-orange text-white">Edit Riwayat Obat</h5>
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
              <form method="POST" action="{{route('riwayatobat.update',$riwayatobat->id)}}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Obat</label>
                            <select class="form-control" id="jenisobat" name="obat_id" required>
                                @foreach ($jenisobat as $data)
                                    <option value="{{$data->id}}" @if ($data->id == $riwayatobat->obat_id)   selected @endif>{{$data->nama_obat}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Isi</label>
                            <input type="number" class="form-control" id="isi" name="isi" required value="{{$riwayatobat->isi}}">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Status</label >
                           <div class="row">
                            <div class="col-sm-6">
                                <div class="form-radio">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="status" id="masuk" value="Masuk" {{($riwayatobat->status=="Masuk") ? 'checked' : ""}}> Masuk
                                  </label>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-radio">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="status" id="keluar" value="Keluar" {{($riwayatobat->status=="Keluar") ? 'checked' : ""}}> Keluar
                                  </label>
                                </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jumlah Unit</label>
                            <input type="number" class="form-control" id="jumlah_unit" name="jumlah_unit" required value="{{$riwayatobat->jumlah_unit}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Harga Satuan</label>
                            <input type="number" class="form-control" id="harga_satuan" name="harga_satuan" required value="{{$riwayatobat->harga_satuan}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Total Harga</label>
                            <input type="number" class="form-control" id="total_harga" name="total_harga" required value="{{$riwayatobat->total_harga}}">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-orange">Submit</button>
                <a class="btn btn-secondary" href="{{ route('riwayatobat.index')}}">Cancel</a>
            </form>

         </div>
        </div>
    </div>
@endsection
