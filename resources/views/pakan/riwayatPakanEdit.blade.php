@extends('layouts.app')
@section('title')
  Edit Riwayat Pakan
@endsection
@section('content')
  <div class="mt-5 col-md-8 mx-auto">
    <div class="card ">
      <h5 class="card-header bg-orange text-white">Edit Riwayat Pakan</h5>
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
          <form method="POST" action="{{route('riwayatpakan.update',$riwayatpakan->id)}}">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">Jenis Pakan</label>
                    <select class="form-control" id="jenispakan" name="pakan_id" required>
                      @foreach ($jenispakan as $data)
                        <option value="{{$data->id}}" 
                          @if ($data->id == $riwayatpakan->pakan_id) selected 
                          @endif>{{$data->jenis_pakan}}
                        </option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal</label>
                  <input type="date" class="form-control" id="tanggal" name="tanggal" required value="{{$riwayatpakan->tanggal}}">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Masuk" @if ($riwayatpakan->status=="Masuk")selected @endif>Masuk</option>
                        <option value="Keluar"  @if ($riwayatpakan->status=="Keluar")selected @endif>Keluar</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Waktu</label>
                    <select class="form-control" id="waktu" name="waktu" required>
                        <option value="Pagi" @if ($riwayatpakan->waktu=="Pagi")selected @endif>Pagi</option>
                        <option value="Siang"  @if ($riwayatpakan->waktu=="Siang")selected @endif>Siang</option>
                        <option value="Sore"  @if ($riwayatpakan->waktu=="Sore")selected @endif>Sore</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jumlah</label>
                  <input type="number" class="form-control" id="jumlah" name="jumlah" required value="{{$riwayatpakan->jumlah}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Harga Satuan</label>
                    <input type="number" class="form-control" id="harga_satuan" name="harga_satuan" required value="{{$riwayatpakan->harga_satuan}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Total Harga</label>
                    <input type="number" class="form-control" id="total_harga" name="total_harga" required value="{{$riwayatpakan->total_harga}}">
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
@section('jp')
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