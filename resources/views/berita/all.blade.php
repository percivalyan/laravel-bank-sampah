@extends('home.layouts.app')

@section('home')
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

                {{-- Paginasi --}}
                @if ($beritas->hasPages())
                    <div class="mt-4 d-flex justify-content-center">
                        {{ $beritas->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection
