@extends('layouts.app')

@section('title', 'Data Sampah')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Sampah</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Add New Button -->
    <a href="{{ route('sampah.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Sampah
    </a>

    @if($sampahs->count())
        <!-- Data Table -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Sampah</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>Nama</th>
                                <th>Satuan</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th style="width: 180px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sampahs as $sampah)
                                <tr>
                                    <td>{{ $sampah->nama }}</td>
                                    <td>{{ $sampah->satuan }}</td>
                                    <td>Rp {{ number_format($sampah->harga, 0, ',', '.') }}</td>
                                    <td>{{ $sampah->deskripsi }}</td>
                                    <td>
                                        <a href="{{ route('sampah.show', $sampah->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Lihat
                                        </a>
                                        <a href="{{ route('sampah.edit', $sampah->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('sampah.destroy', $sampah->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-info">Belum ada data sampah.</div>
    @endif

</div>
<!-- /.container-fluid -->
@endsection
