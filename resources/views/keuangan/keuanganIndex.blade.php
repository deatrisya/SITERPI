@extends('layouts.adminLayout')
@section('title')
    Data Keuangan | SITERPI
@endsection
@section('content')
<div class="col-lg-12 grid-martin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Keuangan</h4>
            <div class="button">
               <div class="row">
                   <div class="col-md-6">
                    <div class="float-left">
                        <a class="btn btn-orange" href="{{route('keuangan.create')}}">+ Tambah Data</a>
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

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Tipe</th>
                            <th scope="col">Tipe ID</th>
                            <th scope="col">Masuk</th>
                            <th scope="col">Keluar</th>
                            <th scope="col">Create At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($keuangan as $data)
                    <tr>
                            <td scope="row">{{ ++$i}}</td>
                            <td>{{$data->tanggal}}</td>
                            <td>{{$data->tipe}}</td>
                            <td>{{$data->tipeID}}</td>
                            <td>{{$data->masuk}}</td>
                            <td>{{$data->keluar}}</td>
                            <td>{{$data->created_at}}</td>
                            <td>
                                <form action="{{ route('keuangan.destroy',  $data->id) }}" method="POST">
                                    <a class="btn btn-icons btn-primary" href="{{route('keuangan.show', $data->id)}}"><i class="mdi mdi-eye"></i></a>
                                    <a class="btn btn-icons btn-warning" href="{{route('keuangan.edit', $data->id)}}"><i class="mdi mdi-pencil"></i></a>
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
            <br><br>
            <div class="paginate">
                <div class="container">
                    <div class="row">
                        <div class="detail-data col-md-12">
                            <p>Page : {!! $keuangan->currentPage() !!} <br />
                                Jumlah Data : {!! $keuangan->total() !!} <br />
                                Data Per Halaman : {!! $keuangan->perPage() !!} <br />
                            </p>
                        </div>
                        <div class="mx-auto">
                            <div class="paginate-button col-md-12">
                                {!! $keuangan->links('vendor.pagination.custom') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
