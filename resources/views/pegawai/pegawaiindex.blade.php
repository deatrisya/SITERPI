@extends('layouts.adminLayout')
@section('title')
    Data Pegawai | SITERPI
@endsection
@section('content')
<div class="col-lg-12 grid-martin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Pegawai</h4>
            <div class="button">
               <div class="row">
                   <div class="col-md-6">
                    <div class="float-left">
                        <a class="btn btn-orange" href="{{route('pegawai.create')}}">+ Tambah Data</a>
                    </div>
                   </div>
                   <div class="col-md-6">
                    <div class="float-right">
                        <form class="form-inline my-2 my-lg-0" action="{{url()->current()}}" method="GET">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword" value="{{request('keyword')}}">
                            <button class="btn btn-icons btn-orange" type="submit"><i class="mdi mdi-magnify"></i></button>
                        </form>
                   </div>
                   <div class="d-flex flex-row-reverse float-right px-2">
                    <a href="{{route('pegawai.cetak_pdf')}}" target="_blank" class="btn btn-icons btn-danger"> <i class="mdi mdi-file-document"></i> </a>
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
                            <th scope="col">NIP</th>
                            <th scope="col">Foto Pegawai</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Tempat Lahir</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Jam Kerja</th>
                            <th scope="col">Gaji</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai as $data)
                    <tr>
                        <td>{{$data->nip}}</td>
                        <td><img width="100px" height="100px" src="{{ asset('storage/' . $data->foto_pegawai) }}"></td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->jenis_kelamin}}</td>
                        <td>{{$data->tempat_lahir}}</td>
                        <td>{{date('d-F-Y', strtotime($data->tanggal_lahir))}}</td>
                        <td>{{$data->alamat}}</td>
                        <td>{{$data->no_telp}}</td>
                        <td>{{$data->jabatan}}</td>
                        <td>{{$data->jam_kerja}} jam </td>
                        <td> Rp. {{number_format($data->gaji),2}}</td>
                        <td>
                            <form action="{{ route('pegawai.destroy',  $data->nip) }}" method="POST">
                                <a class="btn btn-icons btn-primary" href="{{route('pegawai.show', $data->nip)}}"><i class="mdi mdi-eye"></i></a>
                                <a class="btn btn-icons btn-warning" href="{{route('pegawai.edit', $data->nip)}}"><i class="mdi mdi-pencil"></i></a>
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
                            <p>Page : {!! $pegawai->currentPage() !!} <br />
                                Jumlah Data : {!! $pegawai->total() !!} <br />
                                Data Per Halaman : {!! $pegawai->perPage() !!} <br />
                            </p>
                        </div>
                        <div class="mx-auto">
                            <div class="paginate-button col-md-12">
                                {!! $pegawai->links('vendor.pagination.custom') !!}
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
        $('#pegawai').addClass('active');
    </script>
@endsection
