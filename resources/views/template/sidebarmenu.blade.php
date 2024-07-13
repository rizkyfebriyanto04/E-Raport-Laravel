<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>
        <li
            class="sidebar-item active ">
            <a href="{{ route('home')}}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        @if(auth()->user()->role === 'siswa')
        <li
            class="sidebar-item ">
            <a href="{{ route('digitalraport')}}" class='sidebar-link'>
                <i class="fa fa-print"></i>
                <span>Raport</span>
            </a>
        </li>
        @endif
        @if(auth()->user()->role === 'orangtua')
        <li
            class="sidebar-item ">
            <a href="{{ route('digitalraport')}}" class='sidebar-link'>
                <i class="fa fa-print"></i>
                <span>Raport</span>
            </a>
        </li>
        @endif
        @if(auth()->user()->role === 'admin')
        <li
            class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Master Data</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item  ">
                    <a href="{{ route('guru') }}" class="submenu-link">Guru</a>
                </li>
                <li class="submenu-item  ">
                    <a href="{{ route('siswa') }}" class="submenu-link">Siswa</a>
                </li>
                <li class="submenu-item  ">
                    <a href="{{ route('mapel') }}" class="submenu-link">Mata Pelajaran</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="fa fa-address-card"></i>
                <span>Pengguna</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item  ">
                    <a href="{{ route('registrasi') }}" class="submenu-link">Daftar Akun</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="fas fa-pen-square"></i>
                <span>Input Data</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item  ">
                    <a href="{{ route('kehadiran') }}" class="submenu-link">Kehadiran</a>
                </li>
                <li class="submenu-item  ">
                    <a href="{{ route('nilai') }}" class="submenu-link">Nilai</a>
                </li>
            </ul>
        </li>
        <li
            class="sidebar-item ">
            <a href="{{ route('digitalraport')}}" class='sidebar-link'>
                <i class="fa fa-print"></i>
                <span>Raport</span>
            </a>
        </li>
        @endif

        @if(auth()->user()->role === 'guru')
        <li
            class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Master Data</span>
            </a>
            <ul class="submenu ">
                {{-- <li class="submenu-item  ">
                    <a href="{{ route('guru') }}" class="submenu-link">Guru</a>
                </li> --}}
                <li class="submenu-item  ">
                    <a href="{{ route('siswa') }}" class="submenu-link">Siswa</a>
                </li>
                <li class="submenu-item  ">
                    <a href="{{ route('mapel') }}" class="submenu-link">Mata Pelajaran</a>
                </li>
            </ul>
        </li>
        {{-- <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="fa fa-address-card"></i>
                <span>Pengguna</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item  ">
                    <a href="{{ route('registrasi') }}" class="submenu-link">Daftar Akun</a>
                </li>
            </ul>
        </li> --}}
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="fas fa-pen-square"></i>
                <span>Input Data</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item  ">
                    <a href="{{ route('kehadiran') }}" class="submenu-link">Kehadiran</a>
                </li>
                <li class="submenu-item  ">
                    <a href="{{ route('nilai') }}" class="submenu-link">Nilai</a>
                </li>
            </ul>
        </li>
        <li
            class="sidebar-item ">
            <a href="{{ route('digitalraport')}}" class='sidebar-link'>
                <i class="fa fa-print"></i>
                <span>Raport</span>
            </a>
        </li>
        @endif
        {{-- <li
            class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-basket-fill"></i>
                <span>Transaksi</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item  ">
                    <a href="{{ route('penjualan') }}" class="submenu-link">Penjualan</a>
                </li>
            </ul>
        </li>
        <li
            class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-file-earmark-text-fill"></i>
                <span>Laporan</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item  ">
                    <a href="{{ route('laporan') }}" class="submenu-link">Penjualan</a>
                </li>
                <li class="submenu-item  ">
                    <a href="{{ route('penjualan') }}" class="submenu-link">Stok Kadaluarsa</a>
                </li>
            </ul>
        </li> --}}
    </ul>
    <br>
    <ul class="menu">
        {{-- <div class="sidebar-item">
            <p>Profile</p>
            <a href="#" class='sidebar-link'>
                <i class="bi bi-power"></i>
                <span>Logout</span>
            </a>
        </div> --}}
        <li
            class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-person-fill"></i>
                <span>{{ Auth::user()->name }}</span>
            </a>
            <ul class="submenu ">
                {{-- <li class="submenu-item  ">
                    <a href="{{ route('logoutaksi') }}" class="submenu-link">Ganti Password</a>
                </li> --}}
                <li class="submenu-item  ">
                    <a href="{{ route('logoutaksi') }}" class="submenu-link" onclick="return confirm('Apakah anda yakin ingin keluar ?')">Logout</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
