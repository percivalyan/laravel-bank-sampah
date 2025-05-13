@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Saldo Terbaru</h2>

    <div class="card mt-4">
        <div class="card-body">
            <p><strong>Nama User:</strong> {{ $saldo->user->name }}</p>
            <p><strong>Jumlah Saldo:</strong> Rp{{ number_format($saldo->total, 0, ',', '.') }}</p>
            <p><strong>Transaksi ID:</strong> {{ $saldo->transaksi_id }}</p>
            <p><strong>Diperbarui pada:</strong> {{ $saldo->created_at->format('d-m-Y H:i') }}</p>
        </div>
    </div>
</div>
@endsection
