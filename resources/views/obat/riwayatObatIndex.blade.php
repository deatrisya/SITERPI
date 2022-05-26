@extends('layouts.adminLayout')
@section('title')
    Riwayat Obat | SITERPI
@endsection
@section('content')
<div class="col-lg-12 grid-martin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Riwayat Obat</h4>
            <div class="button">
               <div class="row">
                   <div class="col-md-6">
                    <div class="float-left">
                        <a class="btn btn-orange" href="{{route('riwayatobat.create')}}">+ Tambah Data</a>
                    </div>
                   </div>
                   <div class="col-md-6">
                    <div class="float-right">
                        <form class="form-inline my-2 my-lg-0" action="{{url()->current()}}" method="GET">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword" value="{{request('keyword')}}">
                            <button class="btn btn-icons btn-orange" type="submit"><i class="mdi mdi-magnify"></i></button>
                        </form>
                   </div>
               </div>
                </div>
            </div>
            <div class="alert-option">
                <div class="col-md-12">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{$message}}</p>
                    </div>
                @endif

                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Obat</th>
                            <th scope="col">Isi</th>
                            <th scope="col">Status</th>
                            <th scope="col">Jumlah Unit</th>
                            <th scope="col">Harga Satuan</th>
                            <th scope="col">Total Harga </th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayatobat as $data)
                    <tr>
                        <td scope="row">{{ ++$i}}</td>
                        <td>{{$data->obat->nama_obat}}</td>
                        <td>{{$data->isi}} ml</td>
                        @if ($data->status == 'Masuk')
                                <td class="text-center"><span class="badge badge-primary">Masuk</span></td>
                            @else
                                <td class="text-center"><span class="badge badge-warning">Keluar</span></td>
                            @endif
                        <td>{{$data->jumlah_unit}} buah</td>
                        <td>Rp. {{$data->harga_satuan}}</td>
                        <td>Rp. {{$data->total_harga}}</td>
                        <td>
                            <form action="{{ route('riwayatobat.destroy',  $data->id) }}" method="POST">
                                <a class="btn btn-icons btn-primary" href="{{route('riwayatobat.show', $data->id)}}"><i class="mdi mdi-eye"></i></a>
                                <a class="btn btn-icons btn-warning" href="{{route('riwayatobat.edit', $data->id)}}"><i class="mdi mdi-pencil"></i></a>
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="btn btn-icons btn-danger"><i class="mdi mdi-delete"></i></button>
                            </form>
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="paginate">
                <div class="container">
                    <div class="row">
                        <div class="detail-data col-md-12">
                            <p>Page : {!! $riwayatobat->currentPage() !!} <br />
                                Jumlah Data : {!! $riwayatobat->total() !!} <br />
                                Data Per Halaman : {!! $riwayatobat->perPage() !!} <br />
                            </p>
                        </div>
                        <div class="mx-auto">
                            <div class="paginate-button col-md-12">
                                {!! $riwayatobat->links('vendor.pagination.custom') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $('#riwayatobat').addClass('active');
    </script>
@endsection
