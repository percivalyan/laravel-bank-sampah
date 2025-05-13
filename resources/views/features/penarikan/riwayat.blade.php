@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Riwayat Penarikan Saldo</h1>

        @if ($penarikans->isEmpty())
            <p>Belum ada penarikan saldo.</p>
        @else
           <table class="table">
    <thead>
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
                <td>{{ number_format($penarikan->jumlah) }}</td>
                <td>{{ number_format($penarikan->saldo->total) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

        @endif
    </div>
@endsection
