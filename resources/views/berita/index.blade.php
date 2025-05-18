@extends('layouts.app')

@section('title', 'Daftar Berita')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Daftar Berita</h1>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Action Button -->
        <a href="{{ route('berita.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Tambah Berita Baru
        </a>

        <!-- Tabel Berita -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Berita</h6>
            </div>
            <div class="card-body">
                @if ($beritas->count())
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle" width="100%" cellspacing="0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Foto</th>
                                    <th>Judul</th>
                                    <th>Tanggal Terbit</th>
                                    <th style="width: 160px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($beritas as $berita)
                                    <tr>
                                        <td class="text-center" style="width: 100px;">
                                            @if ($berita->photo)
                                                <img src="{{ asset('storage/' . $berita->photo) }}" alt="Foto Berita"
                                                    style="max-width: 80px; max-height: 60px; object-fit: cover;">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('berita.show', $berita->id) }}">
                                                {{ $berita->title }}
                                            </a>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($berita->published_date)->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('berita.edit', $berita->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('berita.destroy', $berita->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash-alt"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if (method_exists($beritas, 'links'))
                        <div class="mt-3">
                            {{ $beritas->links() }}
                        </div>
                    @endif
                @else
                    <div class="alert alert-info">Belum ada berita.</div>
                @endif
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
