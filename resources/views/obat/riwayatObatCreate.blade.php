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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Obat</label>
                            <select class="form-control" id="obat_id" name="obat_id" required>
                                <option value="">--Pilih Jenis Obat--</option>
                                @foreach ($jenisobat as $data)
                                    <option value="{{$data->id}}" {{old('obat_id') == $data->id ? 'selected' : ''}}>{{$data->nama_obat}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('obat_id'))
                             <div class="error">{{ $errors->first('obat_id') }}</div>
                            @endif
                        </div>
                     <div class="form-group">
                         <label for="exampleInputPassword1">Isi</label>
                        <div class="input-group ">
                            <input type="number" class="form-control" id="isi" name="isi" required value="{{old('isi')}}" min="1" onkeyup="hitungHarga()" placeholder="Jumlah Obat">
                            <div class="input-group-prepend bg-secondary">
                                <span class="input-group-text" id="satuan"></span>
                              </div>
                            @if ($errors->has('isi'))
                                <div class="error">{{ $errors->first('isi') }}</div>
                            @endif
                        </div>
                     </div>
                        <div class="form-group">
                            <label class="col-form-label">Status</label >
                            <div class="row">
                            <div class="col-sm-6">
                                <div class="form-radio">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="status" id="masuk" checked value="Masuk" @if (old('status')) checked @endif > Masuk
                                  </label>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-radio">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="status" id="keluar" value="Keluar" @if (old('status')) checked @endif> Keluar
                                  </label>
                                </div>
                              </div>
                           </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @if (old('status') == 'Keluar')
                        <input type="hidden" class="form-control" id="harga_satuan" name="harga_satuan" required >
                        @else
                        <div class="form-group" id="hargaSatuan">
                            <label for="exampleInputPassword1">Harga Satuan</label>
                            <input type="number" class="form-control" id="harga_satuan" name="harga_satuan" required value="{{old('harga_satuan')}}" placeholder="Harga Satuan">
                            @if ($errors->has('harga_satuan'))
                                <div class="error">{{ $errors->first('harga_satuan') }}</div>
                            @endif
                        </div>
                        @endif
                        
                       @if (old('status') == 'Keluar')
                       <input type="hidden" class="form-control" id="total_harga" name="total_harga" required >
                       @else
                       <div class="form-group" id="totalHarga">
                        <label for="exampleInputPassword1" >Total Harga</label>
                        <input type="number" class="form-control" id="total_harga" name="total_harga" required value="{{old('total_harga')}}" placeholder="Total harga">
                        @if ($errors->has('total_harga'))
                            <div class="error">{{ $errors->first('total_harga') }}</div>
                        @endif
                    </div>
                       @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-orange">Submit</button>
                <a class="btn btn-secondary" href="{{ route('riwayatobat.index')}}">Cancel</a>
            </form>

         </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    $('input[type=radio][name=status]').change(function(){
        if(this.value == 'Keluar') {
            $('#hargaSatuan').hide();
            $('#totalHarga').hide();
        } else {
            $('#hargaSatuan').show();
            $('#totalHarga').show();

        }
    });

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $('select#obat_id').on('change',function(e){
            var selected_obat = $(this).children("option:selected").val();
            $.ajax({
                type:"GET",
                dataType:"json",
                url:'/getRiwayatObat/'+selected_obat,
                success:function(response){
                    console.log(response);
                    $('#harga_satuan').val(response.harga);
                    $('#satuan').text(response.satuan);
                    hitungHarga();
                }
            })
        });

        // calculate price
        hitungHarga();
        function hitungHarga() {
            var totalHarga = $('#total_harga');
            var satuan = $('#isi').val();
            var hargaSatuan = $('#harga_satuan').val();

            var hitungTotal = parseFloat(hargaSatuan) * parseFloat(satuan);
            totalHarga.val(hitungTotal);
        }
</script>
@endsection
