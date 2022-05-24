@extends('layouts.app')
@section('title')
    Tambah Data Pgeawai
@endsection
@section('content')
    <div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-orange text-white">Tambah Data Pegawai</h5>
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
              <form method="POST" action="{{route('transaksi.store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID Sapi</label>
                            <select class="form-control" id="sapi_id" name="sapi_id" required>
                                <option value="">--Pilih ID Sapi--</option>
                                @foreach ($sapi as $data)
                                    <option value="{{$data->id}}">{{$data->nis}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Status Transaksi</label>
                            <input type="text" class="form-control" name="status_transaksi" value="Jual" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga"></input>
                        </div>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
                <button type="submit" class="btn btn-orange">Submit</button>
                <a class="btn btn-secondary" href="{{ route('transaksi.index')}}">Cancel</a>
            </form>

         </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $('select#sapi_id').on('change',function(e){
            var selected_sapi = $(this).children("option:selected").val();
            $.ajax({
                type:"GET",
                dataType:"json",
                url:'/getTransaksi/'+selected_sapi,
                success:function(response){
                    console.log(response);
                    $('#harga').val(response.harga)
                }
            })
        });
    });
</script>
@endsection