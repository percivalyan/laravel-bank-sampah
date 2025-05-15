@extends('layouts.app')

@section('title', 'Saldo Terbaru Pengguna')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Saldo Terbaru Setiap Pengguna</h1>

    <!-- Link ke riwayat transaksi -->
    <a href="{{ url('features/saldo') }}" class="btn btn-secondary mb-3">
        <i class="fas fa-history"></i> Riwayat Transaksi
    </a>

    <!-- Card tabel saldo terbaru -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Saldo Terkini</h6>
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
                        @foreach ($latestSaldos as $saldo)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $saldo->user->name }}</td>
                                <td>{{ $saldo->sampah->nama ?? '-' }}</td>
                                <td>Rp {{ number_format($saldo->total, 0, ',', '.') }}</td>
                                <td>{{ $saldo->transaksi_id }}</td>
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
@endsection
