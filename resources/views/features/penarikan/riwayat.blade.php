@extends('layouts.app')

@section('title', 'Riwayat Penarikan Saldo')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Riwayat Penarikan Saldo</h1>

    @if ($penarikans->isEmpty())
        <div class="alert alert-info">
            Belum ada penarikan saldo.
        </div>
    @else
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Riwayat Penarikan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>Nama User</th>
                                <th>Tanggal</th>
                                <th>Jumlah Penarikan</th>
                                <th>Saldo Setelah Penarikan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penarikans as $penarikan)
                                <tr>
                                    <td>{{ $penarikan->saldo->user->name ?? 'Tidak Diketahui' }}</td>
                                    <td>{{ $penarikan->created_at->format('d-m-Y H:i') }}</td>
                                    <td>Rp {{ number_format($penarikan->jumlah, 0, ',', '.') }}</td>
                                    <td>Rp {{ number_format($penarikan->saldo->total, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
