<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register || SITERPI</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.addons.css')}}">

    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    <link rel="shorcut icon" href="{{asset('admin/images/logo-siterpi.png')}}">
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
            <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        <h2 class="text-center mb-4 text-white">Register</h2>
                        <div class="auto-form-wrapper">
                            <form action="{{route('register')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <input id="nama" type="text"
                                            class="form-control @error('nama') is-invalid @enderror" placeholder="Nama"
                                            name="nama" value="{{old('nama')}}" required autocomplete="nama" autofocus>
                                        @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input id="username" type="text"
                                            class="form-control @error('username') is-invalid @enderror"
                                            placeholder="Username" name="username" value="{{old('username')}}" required
                                            autocomplete="username" autofocus>

                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Password" name="password" id="password" required>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="password" class="form-control" placeholder="Confirm Password"
                                            name="password_confirmation" required autocomplete="new-password">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Email@gmail.com" name="email" value="{{old('email')}}" required
                                            autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select class="form-control @error('jenis_kelamin') is-invalid
                                    @enderror" aria-label="Default select example" name="jenis_kelamin"
                                        id="jenis_kelamin" required>
                                        <option>Jenis Kelamin</option>
                                        <option value="P" @if(old('jenis_kelamin')=="P" )selected @endif>Perempuan
                                        </option>
                                        <option value="L" @if(old('jenis_kelamin')=="L" )selected @endif>Laki-Laki
                                        </option>
                                    </select>
                                    @error('jenis_kelamin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input id="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid
                                      @enderror" name="tanggal_lahir" value="{{old('tanggal_lahir')}}" required
                                            autocomplete="tanggal_lahir">
                                        @error('tanggal_lahir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input id="alamat" type="text" class="form-control @error('alamat') is-invalid
                                      @enderror" placeholder="Alamat" name="alamat" value="{{old('alamat')}}" required
                                            autocomplete="alamat">
                                        @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-check-circle-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select class="form-control @error('jabatan') is-invalid
                                    @enderror" aria-label="Default select example" name="jabatan" id="jabatan"
                                        required>
                                        <option>Jabatan</option>
                                        <option value="Admin" @if(old('jabatan')=="Admin" )selected @endif>Admin</option>
                                        <option value="Supervisor" @if(old('jabatan')=="Supervisor" )selected @endif>Supervisor
                                        </option>
                                        <option value="Manajer" @if(old('jabatan')=="Manajer" )selected @endif>Manajer
                                        </option>
                                    </select>
                                    @error('jabatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group d-flex justify-content-center">
                                    <div class="form-check form-check-flat mt-0">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" checked> I agree to the
                                            terms
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary submit-btn btn-block">Register</button>
                                </div>
                                <div class="text-block text-center my-3">
                                    <span class="text-small font-weight-semibold">Already have and account ?</span>
                                    <a href="{{route('login')}}" class="text-black text-small">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('admin/vendors/js/vendor.bundle.addons.js')}}"></script>
    <script src="{{asset('admin/js/off-canvas.js')}}"></script>
    <script src="{{asset('admin/js/misc.js')}}"></script>
    <!-- endinject -->
</body>

</html>
