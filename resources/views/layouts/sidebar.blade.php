<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="user-wrapper">
                    <div class="profile-image">
                        <img src="{{asset('admin/images/faces/face1.jpg')}}" alt="profile image">
                    </div>
                    <div class="text-wrapper">
                        <p class="profile-name">{{Auth()->user()->nama}}</p>
                        <div>
                            <small class="designation text-muted">{{Auth()->user()->jabatan}}</small>
                            <span class="status-indicator online"></span>
                        </div>
                    </div>
                </div>
                {{-- <button class="btn btn-success btn-block">New Project
                <i class="mdi mdi-plus"></i>
              </button> --}}
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">
                <i class="menu-icon mdi mdi-television"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('user.index')}}">
                <i class="menu-icon mdi mdi-account"></i>
                <span class="menu-title">Data User</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="menu-icon mdi mdi-account-multiple-outline"></i>
                <span class="menu-title">Data Pegawai</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-cow"></i>
                <span class="menu-title">Master Sapi</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('jenissapi.index')}}">Jenis Sapi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/ui-features/typography.html">Data Sapi</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false"
                aria-controls="ui-basic1">
                <i class="menu-icon mdi mdi-corn"></i>
                <span class="menu-title">Master Pakan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic1">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="pages/ui-features/buttons.html">Jenis Pakan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/ui-features/typography.html">Riwayat Pakan</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false"
                aria-controls="ui-basic2">
                <i class="menu-icon mdi mdi-medical-bag"></i>
                <span class="menu-title">Master Obat</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic2">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="pages/ui-features/buttons.html">Jenis Obat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/ui-features/typography.html">Riwayat Obat</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="menu-icon mdi mdi-clipboard-text"></i>
                <span class="menu-title">Transaksi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="menu-icon mdi mdi-cash-multiple"></i>
                <span class="menu-title">Keuangan</span>
            </a>
        </li>
    </ul>
</nav>
