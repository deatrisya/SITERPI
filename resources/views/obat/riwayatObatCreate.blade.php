@extends('layouts.app')
@section('title')
    Tambah Riwayat Obat
@endsection
@section('content')
    <div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-orange text-white">Tambah Riwayat Obat</h5>
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
              <form method="POST" action="{{route('riwayatobat.store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Obat</label>
                            <select class="form-control" id="jenisobat" name="obat_id" required>
                                @foreach ($jenisobat as $data)
                                    <option value="{{$data->id}}">{{$data->nama_obat}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('obat_id'))
                             <div class="error">{{ $errors->first('obat_id') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Isi</label>
                            <input type="number" class="form-control" id="isi" name="isi" required value="{{old('isi')}}" placeholder="Jumlah dalam Mililiter">
                            @if ($errors->has('isi'))
                                <div class="error">{{ $errors->first('isi') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Status</label >
                            <div class="row">
                            <div class="col-sm-6">
                                <div class="form-radio">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="status" id="masuk" value="Masuk" checked > Masuk
                                  </label>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-radio">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="status" id="keluar" value="Keluar"> Keluar
                                  </label>
                                </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jumlah Unit</label>
                            <input type="number" class="form-control" id="jumlah_unit" name="jumlah_unit" required value="{{old('jumlah_unit')}}" placeholder="Jumlah Unit">
                            @if ($errors->has('jumlah_unit'))
                                <div class="error">{{ $errors->first('jumlah_unit') }}</div>
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
                <a class="btn btn-secondary" href="{{ route('riwayatobat.index')}}">Cancel</a>
            </form>

         </div>
        </div>
    </div>
@endsection
