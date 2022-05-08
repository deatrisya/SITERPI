@extends('layouts.adminLayout')
@section('title')
    Data Sapi | SITERPI
@endsection
@section('content')
<div class="col-lg-12 grid-martin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Sapi</h4>
            <div class="button">
               <div class="row">
                   <div class="col-md-6">
                    <div class="float-left">
                        <a class="btn btn-orange" href="{{route('sapi.create')}}">+ Tambah Data</a>
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
                            <th scope="col">Jenis Sapi</th>
                            <th scope="col">NIS</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Umur</th>
                            <th scope="col">Status Umur</th>
                            <th scope="col">Status </th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Bobot</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Kondisi</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sapi as $data)
                    <tr>
                            <td scope="row">{{ ++$i}}</td>
                            <td>{{$data->jenissapi->jenis_sapi}}</td>
                            <td>{{$data->nis}}</td>
                            <td>{{$data->tanggal_lahir}}</td>
                            <td>{{$data->umur}}</td>
                            <td>{{$data->status_umur}}</td>
                            <td>{!! $data->statussapi !!}</td>
                            <td>{{$data->jenis_kelamin}}</td>
                            <td>{{$data->bobot}} Kg</td>
                            <td>{{$data->harga}}</td>
                            <td>{{$data->kondisi}}</td>
                            <td>{{$data->keterangan}}</td>
                            <td>
                                <form action="{{ route('sapi.destroy',  $data->id) }}" method="POST">
                                    <a class="btn btn-icons btn-primary" href="{{route('sapi.show', $data->id)}}"><i class="mdi mdi-eye"></i></a>
                                    <a class="btn btn-icons btn-warning" href="{{route('sapi.edit', $data->id)}}"><i class="mdi mdi-pencil"></i></a>

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
                            <p>Page : {!! $sapi->currentPage() !!} <br />
                                Jumlah Data : {!! $sapi->total() !!} <br />
                                Data Per Halaman : {!! $sapi->perPage() !!} <br />
                            </p>
                        </div>
                        <div class="mx-auto">
                            <div class="paginate-button col-md-12">
                                {!! $sapi->links('vendor.pagination.custom') !!}
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
        $('#sapi').addClass('active');
    </script>
@endsection
