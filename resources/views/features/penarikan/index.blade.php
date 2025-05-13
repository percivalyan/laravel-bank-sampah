@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Riwayat Penarikan Saldo</h2>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('features/penarikan/user') }}">Penarikan Saldo</a>
        </li>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
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
                        <td>Rp. {{ number_format($penarikan->jumlah, 0, ',', '.') }}</td>
                        <td>Rp. {{ number_format($penarikan->saldo->total, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada penarikan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
