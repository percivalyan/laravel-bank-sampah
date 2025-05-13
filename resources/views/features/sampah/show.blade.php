@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Sampah</h1>

    <div class="mb-3">
        <strong>Nama:</strong> {{ $sampah->nama }}
    </div>
    <div class="mb-3">
        <strong>Satuan:</strong> {{ $sampah->satuan }}
    </div>
    <div class="mb-3">
        <strong>Harga:</strong> Rp {{ number_format($sampah->harga, 0, ',', '.') }}
    </div>
    <div class="mb-3">
        <strong>Deskripsi:</strong> {{ $sampah->deskripsi }}
    </div>

    <a href="{{ route('sampah.index') }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('sampah.edit', $sampah->id) }}" class="btn btn-warning">Edit</a>
</div>
@endsection
