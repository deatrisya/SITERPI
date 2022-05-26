@extends('layouts.adminLayout')
@section('title')
    Data Transaksi | SITERPI
@endsection
@section('content')
<div class="col-lg-12 grid-martin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Transaksi</h4>
            <div class="button">
               <div class="row">
                   <div class="col-md-6">
                    <div class="float-left">
                        <a class="btn btn-orange" href="{{route('transaksi.create')}}">+ Tambah Data</a>
                    </div>
                   </div>
                    <div class="col-md-6 " >                      
                        <div class="float-right">
                            <form class="form-inline my-2 my-lg-0" action="{{url()->current()}}" method="GET">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword" value="{{request('keyword')}}">
                                <button class="btn btn-icons btn-orange" type="submit"><i class="mdi mdi-magnify"></i></button>
                            </form>
                        </div>
                        <div class="d-flex flex-row-reverse float-right px-2">
                            <a href="{{route('transaksi.transaksi_pdf')}}" target="_blank" class="btn btn-icons btn-danger"><i
                                class="mdi mdi-file-document"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID Sapi</th>
                            <th scope="col">Status Transaksi</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Tanggal Transaksi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $data)
                    <tr>
                            <td scope="row">{{ ++$i}}</td>
                            <td>{{$data->sapi->nis}}</td>
                            @if ($data->status_transaksi == 'Beli')
                                <td class="text-center"><span class="badge badge-primary">Beli</span></td>
                            @else
                                <td class="text-center"><span class="badge badge-success">Jual</span></td>
                            @endif
                            <td>{{$data->harga}}</td>
                            <td>{{$data->created_at}}</td>
                            <td>
                                <form action="{{ route('transaksi.destroy',  $data->id) }}" method="POST">
                                    <a class="btn btn-icons btn-primary" href="{{route('transaksi.show', $data->id)}}"><i class="mdi mdi-eye"></i></a>
                                    <a class="btn btn-icons btn-warning" href="{{route('transaksi.edit', $data->id)}}"><i class="mdi mdi-pencil"></i></a>
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
                            <p>Page : {!! $transaksi->currentPage() !!} <br />
                                Jumlah Data : {!! $transaksi->total() !!} <br />
                                Data Per Halaman : {!! $transaksi->perPage() !!} <br />
                            </p>
                        </div>
                        <div class="mx-auto">
                            <div class="paginate-button col-md-12">
                                {!! $transaksi->links('vendor.pagination.custom') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


