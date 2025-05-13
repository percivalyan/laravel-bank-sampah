@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Saldo Terbaru Setiap Pengguna</h1>
        <a href="{{ url('features/saldo') }}">Riwayat Transaksi</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Pengguna</th>
                    <th>Jenis Sampah</th>
                    <th>Total Saldo</th>
                    <th>Transaksi ID</th>
                    <th>Waktu</th>
                    <th>Saldo</th>
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
