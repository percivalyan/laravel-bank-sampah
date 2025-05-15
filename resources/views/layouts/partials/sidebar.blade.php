<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>

                    {{-- Menu umum, tampil untuk semua role --}}
                    <a class="nav-link" href="{{ url('/') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                        Landing Page
                    </a>

                    {{-- Menu khusus untuk Admin --}}
                    @if (Auth::user()->role == 'admin')
                        <div class="sb-sidenav-menu-heading">Admin</div>
                        <a class="nav-link" href="{{ url('/admin/dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-shield"></i></div>
                            Admin Dashboard
                        </a>
                        <a class="nav-link" href="{{ url('/admin/users') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
                            Kelola Pengguna
                        </a>
                        <a class="nav-link" href="{{ url('features/sampah') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-trash-alt"></i></div>
                            Manajemen Sampah
                        </a>
                        <a class="nav-link" href="{{ url('features/transaksi') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-recycle"></i></div>
                            Setor Sampah
                        </a>
                        <a class="nav-link" href="{{ url('features/saldo-terbaru') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div>
                            Daftar Transaksi
                        </a>
                        <a class="nav-link" href="{{ url('features/saldo') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                            Riwayat Transaksi
                        </a>
                        <a class="nav-link" href="{{ url('features/penarikan') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-money-bill-wave"></i></div>
                            Tarik Tunai
                        </a>
                        <a class="nav-link" href="{{ route('berita.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-news"></i></div>
                            Berita Artikel
                        </a>
                    @endif

                    {{-- Menu khusus untuk Ketua --}}
                    @if (Auth::user()->role == 'ketua')
                        <div class="sb-sidenav-menu-heading">Ketua</div>
                        <a class="nav-link" href="{{ url('/ketua/dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                            Ketua Dashboard
                        </a>
                        <a class="nav-link" href="{{ url('features/sampah') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-trash-alt"></i></div>
                            Manajemen Sampah
                        </a>
                        <a class="nav-link" href="{{ url('features/transaksi/ketua') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div>
                            Daftar Transaksi
                        </a>
                        <a class="nav-link" href="{{ url('features/saldo-terbaru/ketua') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                            Riwayat Transaksi
                        </a>
                    @endif

                    {{-- Menu khusus untuk Bendahara --}}
                    @if (Auth::user()->role == 'bendahara')
                        <div class="sb-sidenav-menu-heading">Bendahara</div>
                        <a class="nav-link" href="{{ url('/bendahara/dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-wallet"></i></div>
                            Bendahara Dashboard
                        </a>
                        <a class="nav-link" href="{{ url('features/saldo-terbaru') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div>
                            Daftar Transaksi
                        </a>
                        <a class="nav-link" href="{{ url('features/saldo') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                            Riwayat Transaksi
                        </a>
                        <a class="nav-link" href="{{ url('features/penarikan') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-money-bill-wave"></i></div>
                            Tarik Tunai
                        </a>
                    @endif

                    {{-- Menu khusus untuk Petugas --}}
                    @if (Auth::user()->role == 'petugas')
                        <div class="sb-sidenav-menu-heading">Petugas</div>
                        <a class="nav-link" href="{{ url('/petugas/dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-check"></i></div>
                            Petugas Dashboard
                        </a>
                        <a class="nav-link" href="{{ url('features/transaksi') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-recycle"></i></div>
                            Setor Sampah
                        </a>
                    @endif

                    {{-- Menu khusus untuk User --}}
                    @if (Auth::user()->role == 'user')
                        <div class="sb-sidenav-menu-heading">User</div>
                        <a class="nav-link" href="{{ url('/user/dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            User Dashboard
                        </a>
                        <a class="nav-link" href="{{ route('saldo.private') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-wallet"></i></div>
                            Saldo Saya
                        </a>
                        <a class="nav-link" href="{{ url('user/riwayat-penarikan') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                            Riwayat Saya
                        </a>
                    @endif

                    {{-- Profil (untuk semua role) --}}
                    <div class="sb-sidenav-menu-heading">Akun</div>
                    <a class="nav-link" href="{{ route('profile.edit') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-id-badge"></i></div>
                        Profil Saya
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                {{ Auth::user()->name }} ({{ Auth::user()->role }})
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
