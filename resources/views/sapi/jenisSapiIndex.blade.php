@extends('layouts.adminLayout')
@section('title')
    Jenis Sapi | SITERPI
@endsection
@section('content')
<div class="col-lg-12 grid-martin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Jenis Sapi</h4>
            <div class="button">
               <div class="row">
                   <div class="col-md-6">
                    <div class="float-left">
                        <a class="btn btn-orange" href="{{route('jenissapi.create')}}">+ Tambah Data</a>
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
                            <a href="{{route('jenisSapi_pdf')}}" target="_blank" class="btn btn-icons btn-danger"><i
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
                            <th scope="col">Jenis Sapi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jenis as $data)
                        <tr>
                            <td scope="row">{{ ++$i}}</td>
                            <td>{{$data->jenis_sapi}}</td>
                            <td>
                                <form action="{{ route('jenissapi.destroy',  $data->id) }}" method="POST">
                                    <a class="btn btn-icons btn-primary" href="{{route('jenissapi.show', $data->id)}}"><i class="mdi mdi-eye"></i></a>
                                    <a class="btn btn-icons btn-warning" href="{{route('jenissapi.edit', $data->id)}}"><i class="mdi mdi-pencil"></i></a>

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
                            <p>Page : {!! $jenis->currentPage() !!} <br />
                                Jumlah Data : {!! $jenis->total() !!} <br />
                                Data Per Halaman : {!! $jenis->perPage() !!} <br />
                            </p>
                        </div>
                        <div class="mx-auto">
                            <div class="paginate-button col-md-12">
                                {!! $jenis->links('vendor.pagination.custom') !!}
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
        $('#jenissapi').addClass('active');
    </script>
@endsection
