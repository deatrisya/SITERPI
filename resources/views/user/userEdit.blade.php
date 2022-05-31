@extends('layouts.app')
@section('title')
    Edit Data User
@endsection
@section('content')
    <div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-orange text-white">Edit Data User</h5>
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
              <form method="POST" action="{{route('user.update',$user->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" class="form-control" aria-describedby="foto" value="{{old('foto')}}">
                            <img height="100px" width="100px" src="{{asset('storage/'.$user->foto)}}" alt="gambar profil" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{$user->nama}}" required>
                            @if ($errors->has('nama'))
                                <div class="error">{{ $errors->first('nama') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Username</label>
                            <input type="text" class="form-control" name="username" value="{{$user->username}}" required>
                            @if ($errors->has('username'))
                                <div class="error">{{ $errors->first('username') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="example">Ganti Password</label>
                            <input type="password" class="form-control" name="password">
                            @if ($errors->has('password'))
                                <div class="error">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="example">Konfirmasi Password</label>
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jabatan</label>
                            <select class="form-control" name="jabatan" required>
                                <option value="Admin" @if ($user->jabatan == "Admin")selected @endif>Admin</option>
                                <option value="Supervisor" @if ($user->jabatan == "Supervisor")selected @endif>Supervisor</option>
                                <option value="Manajer" @if ($user->jabatan == "Manajer")selected @endif>Manajer</option>
                            </select>
                            @if ($errors->has('jabatan'))
                                <div class="error">{{ $errors->first('jabatan') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" class="form-control" name="email" value="{{$user->email}}" required>
                            @if ($errors->has('email'))
                                <div class="error">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">No HP</label>
                            <input type="text" class="form-control" name="no_hp" value="{{$user->no_hp}}" required>
                            @if ($errors->has('no_hp'))
                                <div class="error">{{ $errors->first('no_hp') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Jenis Kelamin</label>
                           <div class="row">
                            <div class="col-sm-6">
                                <div class="form-radio">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="L" {{($user->jenis_kelamin=="L") ? 'checked' : ""}}> Laki-laki
                                  </label>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-radio">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="P" {{($user->jenis_kelamin=="P") ? 'checked' : ""}}> Perempuan
                                  </label>
                                </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" value="{{$user->tanggal_lahir}}" required>
                            @if ($errors->has('tanggal_lahir'))
                                <div class="error">{{ $errors->first('tanggal_lahir') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Alamat</label>
                            <textarea class="form-control" name="alamat" rows="3" required>{{$user->alamat}}</textarea>
                            @if ($errors->has('alamat'))
                                <div class="error">{{ $errors->first('alamat') }}</div>
                            @endif
                        </div>

                    </div>
                </div>
                <button type="submit" class="btn btn-orange">Submit</button>
                <a class="btn btn-secondary" href="{{ route('user.index')}}">Cancel</a>
            </form>

         </div>
        </div>
    </div>
@endsection
