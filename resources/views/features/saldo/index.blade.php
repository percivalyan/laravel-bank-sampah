@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Saldo Pengguna</h1>

        <!-- Menampilkan pesan sukses jika ada -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel saldo -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Pengguna</th>
                    <th>Jenis Sampah</th>
                    <th>Total Saldo</th>
                    <th>Transaksi ID</th>
                    <th>Waktu</th>
                    <th>Aksi</th> <!-- Kolom tambahan -->
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
                            <a href="{{ route('saldo.show', $saldo->user_id) }}" class="btn btn-primary btn-sm">
                                Show
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
