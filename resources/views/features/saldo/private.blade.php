<!-- resources/views/features/saldo/private.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Saldo Saya</h2>
    @if(session('message'))
        <div class="alert alert-info">{{ session('message') }}</div>
    @endif

    @if($saldo)
        <p><strong>Total Saldo:</strong> Rp{{ number_format($saldo->total, 0, ',', '.') }}</p>
        <p><strong>Terakhir diperbarui:</strong> {{ $saldo->created_at->format('d M Y H:i') }}</p>
    @else
        <p>Saldo belum tersedia.</p>
    @endif
</div>
@endsection
