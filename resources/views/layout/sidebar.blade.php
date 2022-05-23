<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon ">
                    <i class="fas fa-laptop-medical"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SIMDIG KMS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            @can('operator-plkb')
            <li class="nav-item active">
                <a class="nav-link" href="{{route ('berandaOperator')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Data Master
            </div>
            <li class="nav-item">
                <a class="nav-link" href="{{route ('posyandu')}}">
                    <i class="fas fa-book-medical"></i>
                    <span>Data Posyandu</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route ('kader')}}">
                    <i class="fas fa-user"></i>
                    <span>Data Kader</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route ('bayiBalita')}}">
                    <i class="fas fa-baby"></i>
                    <span>Data Bayi/Balita</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route ('bidan')}}">
                    <i class="fas fa-user-nurse"></i>
                    <span>Data Bidan Desa</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route ('user')}}">
                    <i class="fas fa-user"></i>
                    <span>Data User</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route ('laporan')}}">
                    <i class="fas fa-book"></i>
                    <span>Data Laporan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @endcan
            @can('kepala-plkb')
            <li class="nav-item active">
                <a class="nav-link" href="{{route ('berandaOperator')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                 
            </div>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.profile', Auth::user()->id) }}">
                    <i class="fas fa-user"></i>
                    <span>Data Diri</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route ('laporan')}}">
                    <i class="fas fa-book"></i>
                    <span>Data Laporan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @endcan
            @can('ibu-bayi')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('userIbu.profile', Auth::user()->id) }}">
                    <i class="fas fa-user"></i>
                    <span>Data Diri</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route ('hasilPerkembangan') }}">
                    <i class="fas fa-chart-bar"></i>
                    <span>Hasil Perkembangan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('konsultasiIbu') }}">
                    <i class="fas fa-user"></i>
                    <span>Konsultasi Online</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @endcan
            @can('kader')
            <li class="nav-item active">
                <a class="nav-link" href="{{route ('berandaKader')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                 
            </div>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.profile', Auth::user()->id) }}">
                    <i class="fas fa-user"></i>
                    <span>Data Diri</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route ('timbangbayiBalita')}}">
                    <i class="fas fa-baby"></i>
                    <span>Data Timbang Bayi/Balita</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route ('penyuluhanKader')}}">
                    <i class="fas fa-users"></i>
                    <span>Penyuluhan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-book"></i>
                    <span>Data Laporan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @endcan
            @can('bidan-desa')
            <li class="nav-item active">
                <a class="nav-link" href="{{route ('berandaBidan')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                 
            </div>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.profile', Auth::user()->id) }}">
                    <i class="fas fa-user"></i>
                    <span>Data Diri</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route ('imunisasiDanvitaminA')}}">
                    <i class="fas fa-briefcase-medical"></i>
                    <span>Data Imunisasi&VitaminA</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route ('jenisVaksinImunisasi')}}">
                    <i class="fas fa-vials"></i>
                    <span>Jenis Vaksin Imunisasi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route ('konsultasi')}}">
                    <i class="fas fa-user"></i>
                    <span>Konsultasi Online</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route ('penyuluhan')}}">
                    <i class="fas fa-calendar"></i>
                    <span>Jadwal Penyuluhan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route ('jadwalPosyandu')}}">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Jadwal Posyandu</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-book"></i>
                    <span>Data Laporan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @endcan
</ul>