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
                            <select class="form-control" name="pakan_id" id="pakan_id" required>
                                <option value="">--Pilih Jenis Pakan--</option>
                                @foreach ($jenispakan as $data)
                                    <option value="{{$data->id}}" {{old('pakan_id') == $data->id ? 'selected' : ''}}>{{$data->jenis_pakan}}</option>
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
                                <option value="Masuk" {{old('status') == 'Masuk' ? 'selected' : ''}}>Masuk</option>
                                <option value="Keluar" {{old('status') == 'Keluar' ? 'selected' : ''}}>Keluar</option>
                            </select>
                            @if ($errors->has('status'))
                                <div class="error">{{ $errors->first('status') }}</div>
                            @endif
                            {{-- @if (old('status' == 'Keluar'))
                            input
                            @endif --}}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Waktu</label>
                            <select class="form-control" id="waktu" name="waktu" rows="3" disabled>
                                <option value="Pagi" {{old('waktu') == 'Pagi' ? 'selected' : ''}}>Pagi</option>
                                <option value="Siang" {{old('waktu') == 'Siang' ? 'selected' : ''}}>Siang</option>
                                <option value="Sore" {{old('waktu') == 'Sore' ? 'selected' : ''}}>Sore</option>
                            </select>
                            @if ($errors->has('waktu'))
                                <div class="error">{{ $errors->first('waktu') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" required value="1" min="1" onkeyup="hitungHarga()" placeholder="Jumlah">
                            @if ($errors->has('jumlah'))
                                <div class="error">{{ $errors->first('jumlah') }}</div>
                            @endif
                            @if(session()->has('jumlah'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group" id="hargaSatuan">
                            @if (old('status') == 'Keluar')
                            <input type="hidden" class="form-control" id="harga_satuan" name="harga_satuan" value="{{old('harga_satuan')}}" >
                            @else
                                <label for="exampleInputPassword1">Harga Satuan</label>
                                <input type="number" class="form-control" id="harga_satuan" name="harga_satuan" required value="{{old('harga_satuan')}}" placeholder="Harga Satuan" >
                            @endif

                            @if ($errors->has('harga_satuan'))
                              <div class="error">{{ $errors->first('harga_satuan') }}</div>
                            @endif
                        </div>
                        <div class="form-group" id="totalHarga">
                            @if (old('status')== 'Keluar')
                                <input type="hidden" class="form-control" id="total_harga" name="total_harga" required value="{{old('total_harga')}}" placeholder="Total harga">
                            @else
                                <label for="exampleInputPassword1">Total Harga</label>
                                <input type="number" class="form-control" id="total_harga" name="total_harga" required value="{{old('total_harga')}}" placeholder="Total harga">
                            @endif
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
                $('#hargaSatuan').hide();
                $('#totalHarga').hide();
            } else {
                $("#waktu").attr("disabled", "disabled");
                $('#hargaSatuan').show();
                $('#totalHarga').show();
            }
        });
    });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $('select#pakan_id').on('change',function(e){
            var selected_pakan = $(this).children("option:selected").val();
            $.ajax({
                type:"GET",
                dataType:"json",
                url:'/getRiwayatPakan/'+selected_pakan,
                success:function(response){
                    console.log(response);
                    $('#harga_satuan').val(response.harga)
                    hitungHarga();
                }
            })
        });

        // calculate price
        hitungHarga();
        function hitungHarga() {
            var totalHarga = $('#total_harga');
            var satuan = $('#jumlah').val();
            var hargaSatuan = $('#harga_satuan').val();

            var hitungTotal = parseFloat(hargaSatuan) * parseFloat(satuan);
            totalHarga.val(hitungTotal);
        }

</script>
@endsection
