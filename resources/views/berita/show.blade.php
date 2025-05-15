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
                        <span class="text-body">Get Free Delivery</span>
                        <a href="tel:+4733378901"><span class="text-primary">Free: + 0123 456 7890</span></a>
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
                        <img src="{{ asset('home/img/carousel-1.jpg') }}" class="img-fluid w-100" alt="Image">
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
                        <img src="{{ asset('home/img/carousel-2.jpg') }}" class="img-fluid w-100" alt="Image">
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


    <!-- Berita Detail Start -->
    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <article class="bg-white shadow-sm rounded p-4">
                    <h1 class="mb-3">{{ $berita->title }}</h1>
                    <div class="mb-3 text-muted">
                        <i class="fa fa-calendar-alt me-2"></i>
                        {{ \Carbon\Carbon::parse($berita->published_date)->format('d M Y') }}
                    </div>
                    @if($berita->image)
                        <img src="{{ asset('storage/' . $berita->image) }}" alt="{{ $berita->title }}" class="img-fluid rounded mb-4" />
                    @endif
                    <div class="content">
                        {!! $berita->content !!}
                    </div>
                </article>

                <a href="{{ url('/') }}" class="btn btn-outline-primary mt-4">
                    <i class="fa fa-angle-left me-2"></i> Kembali
                </a>
            </div>
        </div>
    </div>
    <!-- Berita Detail End -->
@endsection
