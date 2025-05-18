@extends('home.layouts.app')

@section('home')
    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0">
                <h1 class="text-primary">BankSampah</h1>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                    <a href="#feature" class="nav-item nav-link">Feature</a>
                    <a href="#about" class="nav-item nav-link">About</a>
                    <a href="#blog" class="nav-item nav-link">Blog</a>
                </div>
                <div class="d-none d-xl-flex me-3">
                    <div class="d-flex flex-column pe-3 border-end border-primary">
                        <span class="text-body">Contact Person</span>
                        <a href="tel:+4733378901"><span class="text-primary">WA:
                                +62 812-3456-7890</span></a>
                    </div>
                </div>
                <button class="btn btn-primary btn-md-square d-flex flex-shrink-0 mb-3 mb-lg-0 rounded-circle me-3"
                    data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></button>
                @auth
                    <!-- Check the user's role and redirect to the respective dashboard -->
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ url('/admin/dashboard') }}"
                            class="btn btn-primary rounded-pill d-inline-flex flex-shrink-0 py-2 px-4">
                            Admin Dashboard
                        </a>
                    @elseif(Auth::user()->role == 'petugas')
                        <a href="{{ url('/petugas/dashboard') }}"
                            class="btn btn-primary rounded-pill d-inline-flex flex-shrink-0 py-2 px-4">
                            Petugas Dashboard
                        </a>
                    @elseif(Auth::user()->role == 'user')
                        <a href="{{ url('/user/dashboard') }}"
                            class="btn btn-primary rounded-pill d-inline-flex flex-shrink-0 py-2 px-4">
                            User Dashboard
                        </a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary rounded-pill d-inline-flex flex-shrink-0 py-2 px-4">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="btn btn-primary rounded-pill d-inline-flex flex-shrink-0 py-2 px-4">
                            Register
                        </a>
                    @endif
                @endauth
            </div>
        </nav>

        <!-- Carousel Start -->
        <div class="carousel-header">
            <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="{{ asset('unsplash/nikhil-mitra-jKe_eHk50Zk-unsplash.jpg') }}" class="img-fluid w-100"
                            alt="Image">
                        <div class="carousel-caption-1">
                            <div class="carousel-caption-1-content" style="max-width: 900px;">
                                <h4 class="text-white text-uppercase fw-bold mb-4 fadeInLeft animated"
                                    data-animation="fadeInLeft" data-delay="1s" style="animation-delay: 1s;"
                                    style="letter-spacing: 3px;">Peduli Lingkungan</h4>
                                <h1 class="display-2 text-capitalize text-white mb-4 fadeInLeft animated"
                                    data-animation="fadeInLeft" data-delay="1.3s" style="animation-delay: 1.3s;">Daur Ulang
                                    Sampah untuk Masa Depan Lebih Baik</h1>
                                <p class="mb-5 fs-5 text-white fadeInLeft animated" data-animation="fadeInLeft"
                                    data-delay="1.5s" style="animation-delay: 1.5s;"> Mari kelola sampah menjadi lebih
                                    bernilai. Tukarkan sampah daur ulang Anda dan bantu wujudkan lingkungan yang bersih dan
                                    sehat.
                                </p>
                                <div class="carousel-caption-1-content-btn fadeInLeft animated" data-animation="fadeInLeft"
                                    data-delay="1.7s" style="animation-delay: 1.7s;">
                                    @auth
                                        <!-- Check the user's role and redirect to the respective dashboard -->
                                        @if (Auth::user()->role == 'admin')
                                            <a href="{{ url('/admin/dashboard') }}"
                                                class="btn btn-primary rounded-pill flex-shrink-0 py-3 px-5 me-2">
                                                Admin Dashboard
                                            </a>
                                        @elseif(Auth::user()->role == 'petugas')
                                            <a href="{{ url('/petugas/dashboard') }}"
                                                class="btn btn-primary rounded-pill flex-shrink-0 py-3 px-5 me-2">
                                                Petugas Dashboard
                                            </a>
                                        @elseif(Auth::user()->role == 'user')
                                            <a href="{{ url('/user/dashboard') }}"
                                                class="btn btn-primary rounded-pill flex-shrink-0 py-3 px-5 me-2">
                                                User Dashboard
                                            </a>
                                        @endif
                                    @else
                                        <a href="{{ route('login') }}"
                                            class="btn btn-primary rounded-pill flex-shrink-0 py-3 px-5 me-2">
                                            Log in
                                        </a>
                                    @endauth
                                    <a class="btn btn-secondary rounded-pill flex-shrink-0 py-3 px-5 ms-2"
                                        href="#">Lihat Jenis Sampah Daur Ulang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('unsplash/roger-starnes-sr-M79O3aCIGAo-unsplash.jpg') }}"
                            class="img-fluid w-100" alt="Image">
                        <div class="carousel-caption-2">
                            <div class="carousel-caption-2-content" style="max-width: 900px;">
                                <h4 class="text-white text-uppercase fw-bold mb-4 fadeInRight animated"
                                    data-animation="fadeInRight" data-delay="1s" style="animation-delay: 1s;"
                                    style="letter-spacing: 3px;">Bank Sampah Digital</h4>
                                <h1 class="display-2 text-capitalize text-white mb-4 fadeInRight animated"
                                    data-animation="fadeInRight" data-delay="1.3s" style="animation-delay: 1.3s;">
                                    Tukar Sampah Jadi Uang Lebih Mudah</h1>
                                <p class="mb-5 fs-5 text-white fadeInRight animated" data-animation="fadeInRight"
                                    data-delay="1.5s" style="animation-delay: 1.5s;">Dengan sistem digital, kamu bisa
                                    menabung sampah dan mencairkan saldo kapan pun. Bergabunglah dan bantu bumi kita lebih
                                    bersih!
                                </p>
                                <div class="carousel-caption-2-content-btn fadeInRight animated"
                                    data-animation="fadeInRight" data-delay="1.7s" style="animation-delay: 1.7s;">
                                    @auth
                                        <!-- Check the user's role and redirect to the respective dashboard -->
                                        @if (Auth::user()->role == 'admin')
                                            <a href="{{ url('/admin/dashboard') }}"
                                                class="btn btn-primary rounded-pill flex-shrink-0 py-3 px-5 me-2">
                                                Admin Dashboard
                                            </a>
                                        @elseif(Auth::user()->role == 'petugas')
                                            <a href="{{ url('/petugas/dashboard') }}"
                                                class="btn btn-primary rounded-pill flex-shrink-0 py-3 px-5 me-2">
                                                Petugas Dashboard
                                            </a>
                                        @elseif(Auth::user()->role == 'user')
                                            <a href="{{ url('/user/dashboard') }}"
                                                class="btn btn-primary rounded-pill flex-shrink-0 py-3 px-5 me-2">
                                                User Dashboard
                                            </a>
                                        @endif
                                    @else
                                        <a href="{{ route('login') }}"
                                            class="btn btn-primary rounded-pill flex-shrink-0 py-3 px-5 me-2">
                                            Log in
                                        </a>
                                    @endauth
                                    <a class="btn btn-secondary rounded-pill flex-shrink-0 py-3 px-5 ms-2"
                                        href="#">Lihat Jenis Sampah Daur Ulang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon btn btn-primary fadeInLeft animated" aria-hidden="true"
                        data-animation="fadeInLeft" data-delay="1.1s" style="animation-delay: 1.3s;"> <i
                            class="fa fa-angle-left fa-3x"></i></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                    <span class="carousel-control-next-icon btn btn-primary fadeInRight animated" aria-hidden="true"
                        data-animation="fadeInLeft" data-delay="1.1s" style="animation-delay: 1.3s;"><i
                            class="fa fa-angle-right fa-3x"></i></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->
    </div>
    <!-- Navbar & Hero End -->

    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h4 class="modal-title mb-0" id="exampleModalLabel">Search by keyword</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords"
                            aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text btn border p-3"><i
                                class="fa fa-search text-white"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->

    <!-- feature Start -->
    <div class="" id="feature">
        <div class="container-fluid feature bg-light py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-uppercase text-primary">Fitur Kami</h4>
                    <h1 class="display-3 text-capitalize mb-3">Inovasi Digital untuk Bank Sampah</h1>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="feature-item p-4">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-recycle text-white fa-3x"></i>
                            </div>
                            <a href="#" class="h4 mb-3">Manajemen Sampah</a>
                            <p class="mb-3">Pantau, setor, dan kelola sampah Anda dengan mudah melalui sistem digital
                                kami.
                            </p>
                            <a href="#" class="btn text-secondary">Pelajari Lebih <i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="feature-item p-4">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-wallet text-white fa-3x"></i>
                            </div>
                            <a href="#" class="h4 mb-3">Dompet Digital</a>
                            <p class="mb-3">Saldo hasil penukaran sampah langsung tercatat di akun dompet digital Anda.
                            </p>
                            <a href="#" class="btn text-secondary">Pelajari Lebih <i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="feature-item p-4">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-chart-line text-white fa-3x"></i>
                            </div>
                            <a href="#" class="h4 mb-3">Laporan & Statistik</a>
                            <p class="mb-3">Dapatkan laporan transaksi dan kontribusi lingkungan secara real-time.</p>
                            <a href="#" class="btn text-secondary">Pelajari Lebih <i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                        <div class="feature-item p-4">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-users text-white fa-3x"></i>
                            </div>
                            <a href="#" class="h4 mb-3">Komunitas Peduli</a>
                            <p class="mb-3">Gabung dalam komunitas digital untuk edukasi dan aksi bersama menjaga
                                lingkungan.
                            </p>
                            <a href="#" class="btn text-secondary">Pelajari Lebih <i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- feature End -->

    <!-- About Start -->
    <div id="about">
        <div class="container-fluid about overflow-hidden py-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="about-img rounded h-100">
                            <img src="{{ asset('unsplash/shamblen-studios-jfhFJirnwcE-unsplash.jpg') }}"
                                class="img-fluid rounded h-100 w-100" style="object-fit: cover;"
                                alt="Tentang Bank Sampah">
                            {{-- <div class="about-exp"><span>10+ Tahun Pengalaman</span></div> --}}
                        </div>
                    </div>
                    <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                        <div class="about-item">
                            <h4 class="text-primary text-uppercase">Tentang Kami</h4>
                            <h1 class="display-3 mb-3">Solusi Digital untuk Pengelolaan Sampah</h1>
                            <p class="mb-4">
                                Kami adalah platform Bank Sampah Digital yang bertujuan untuk memudahkan masyarakat dalam
                                mengelola dan menukar sampah menjadi nilai ekonomi. Dengan sistem yang terintegrasi, kami
                                membantu meningkatkan kesadaran lingkungan dan mendukung ekonomi sirkular.
                            </p>

                            <!-- Fitur 1 -->
                            <div class="bg-light rounded p-4 mb-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <div class="pe-4">
                                                <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center"
                                                    style="width: 80px; height: 80px;">
                                                    <i class="fas fa-users text-white fa-2x"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <a href="#" class="h4 d-inline-block mb-3">Partisipasi
                                                    Masyarakat</a>
                                                <p class="mb-0">Memberdayakan warga untuk aktif memilah, menyetor, dan
                                                    menukar sampah dengan transparansi digital.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Fitur 2 -->
                            <div class="bg-light rounded p-4 mb-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <div class="pe-4">
                                                <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center"
                                                    style="width: 80px; height: 80px;">
                                                    <i class="fas fa-mobile-alt text-white fa-2x"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <a href="#" class="h4 d-inline-block mb-3">Akses Mudah Lewat
                                                    Aplikasi</a>
                                                <p class="mb-0">Kelola sampah, pantau saldo, dan dapatkan reward langsung
                                                    dari ponsel Anda.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a href="#" class="btn btn-secondary rounded-pill py-3 px-5">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Fact Counter -->
    <div class="container-fluid counter py-5 bg-primary">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="counter-item text-center">
                        <div class="counter-item-icon mx-auto mb-3">
                            <i class="fas fa-users fa-3x text-white"></i>
                        </div>
                        <h4 class="text-white mb-3">Anggota Aktif</h4>
                        <div class="counter-counting">
                            <span class="text-white fs-2 fw-bold" data-toggle="counter-up">1250</span>
                            <span class="h1 fw-bold text-white">+</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="counter-item text-center">
                        <div class="counter-item-icon mx-auto mb-3">
                            <i class="fas fa-recycle fa-3x text-white"></i>
                        </div>
                        <h4 class="text-white mb-3">Sampah Terkumpul (kg)</h4>
                        <div class="counter-counting">
                            <span class="text-white fs-2 fw-bold" data-toggle="counter-up">7560</span>
                            <span class="h1 fw-bold text-white">+</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="counter-item text-center">
                        <div class="counter-item-icon mx-auto mb-3">
                            <i class="fas fa-hand-holding-heart fa-3x text-white"></i>
                        </div>
                        <h4 class="text-white mb-3">Kegiatan Sosial</h4>
                        <div class="counter-counting">
                            <span class="text-white fs-2 fw-bold" data-toggle="counter-up">87</span>
                            <span class="h1 fw-bold text-white">+</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="counter-item text-center">
                        <div class="counter-item-icon mx-auto mb-3">
                            <i class="fas fa-calendar-alt fa-3x text-white"></i>
                        </div>
                        <h4 class="text-white mb-3">Tahun Pengalaman</h4>
                        <div class="counter-counting">
                            <span class="text-white fs-2 fw-bold" data-toggle="counter-up">12</span>
                            <span class="h1 fw-bold text-white">+</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact Counter -->

    <!-- Blog Start -->
    <div id="blog" class="py-5">
        <div class="container-fluid blog bg-light pb-5 py-5">
            <div class="container pb-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-uppercase text-primary">Berita & Artikel</h4>
                    <h1 class="display-3 text-capitalize mb-3">Informasi Terbaru Bank Sampah</h1>
                </div>
                <div class="row g-4 justify-content-center">
                    @forelse ($beritas as $index => $berita)
                        <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="{{ 0.2 + $index * 0.2 }}s">
                            <div class="blog-item shadow-sm rounded bg-white">
                                <div class="blog-img position-relative">
                                    @if ($berita->photo)
                                        <img src="{{ asset('storage/' . $berita->photo) }}" alt="Foto Berita"
                                            class="img-fluid rounded-top w-100">
                                    @else
                                        <img src="{{ asset('home/img/blog-' . (($index % 3) + 1) . '.jpg') }}"
                                            class="img-fluid rounded-top w-100" alt="{{ $berita->title }}">
                                    @endif
                                    <div
                                        class="blog-date px-3 py-1 bg-primary text-white position-absolute top-0 end-0 m-3 rounded">
                                        <i class="fa fa-calendar-alt me-1"></i>
                                        {{ \Carbon\Carbon::parse($berita->published_date)->format('d M Y') }}
                                    </div>
                                </div>
                                <div class="blog-content rounded-bottom p-4">
                                    <a href="{{ route('berita.show', $berita->id) }}"
                                        class="h4 d-inline-block mb-3 text-dark">
                                        {{ $berita->title }}
                                    </a>
                                    <p>
                                        {{ $berita->summary
                                            ? \Illuminate\Support\Str::limit($berita->summary, 120)
                                            : \Illuminate\Support\Str::limit(strip_tags($berita->content), 120) }}
                                    </p>
                                    <a href="{{ route('berita.show', $berita->id) }}" class="fw-bold text-primary">
                                        Baca Selengkapnya <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p class="text-muted">Belum ada berita yang tersedia saat ini.</p>
                        </div>
                    @endforelse
                </div>

                <!-- PAGINATION -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $beritas->onEachSide(1)->links('pagination::bootstrap-5') }}
                </div>

                <div class="text-center mt-4">
                    <a href="{{ url('berita-all') }}" class="btn btn-primary">
                        Lihat Semua Berita
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection
