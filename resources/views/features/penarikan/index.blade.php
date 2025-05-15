@extends('layouts.app')

@section('title', 'Riwayat Penarikan Saldo')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Riwayat Penarikan Saldo</h1>

    <!-- Link ke halaman penarikan -->
    <a href="{{ url('features/penarikan/user') }}" class="btn btn-primary mb-3">
        <i class="fas fa-wallet"></i> Penarikan Saldo
    </a>

    <!-- Notifikasi sukses -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Card Riwayat -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Riwayat Penarikan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Jumlah Penarikan</th>
                            <th>Saldo Tersisa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($penarikans as $penarikan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $penarikan->saldo->user->name }}</td>
                                <td>{{ $penarikan->created_at->format('d-m-Y H:i') }}</td>
                                <td>Rp {{ number_format($penarikan->jumlah, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($penarikan->saldo->total, 0, ',', '.') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada penarikan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
