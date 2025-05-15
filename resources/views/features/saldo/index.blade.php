@extends('layouts.app')

@section('title', 'Daftar Saldo Pengguna')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Daftar Saldo Pengguna</h1>

    <!-- Menampilkan pesan sukses -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Card Tabel Saldo -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Saldo Pengguna</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Nama Pengguna</th>
                            <th>Jenis Sampah</th>
                            <th>Total Saldo</th>
                            <th>ID Transaksi</th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($saldos as $saldo)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $saldo->user->name }}</td>
                            <td>{{ $saldo->sampah->nama }}</td>
                            <td>Rp {{ number_format($saldo->transaksi->total_harga, 0, ',', '.') }}</td>
                            <td>{{ $saldo->transaksi->id }}</td>
                            <td>{{ $saldo->created_at->format('d-m-Y H:i:s') }}</td>
                            <td>
                                <a href="{{ route('saldo.show', $saldo->user_id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Lihat
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
