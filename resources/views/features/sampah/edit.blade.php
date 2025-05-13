@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Sampah</h1>

        <form action="{{ route('sampah.update', $sampah->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Sampah</label>
                <input type="text" name="nama" class="form-control" value="{{ $sampah->nama }}" required>
            </div>
            <div class="mb-3">
                <label for="satuan" class="form-label">Satuan</label>
                <select name="satuan" class="form-select" required>
                    <option value="kg" {{ $sampah->satuan == 'kg' ? 'selected' : '' }}>Kilogram (kg)</option>
                    <option value="buah" {{ $sampah->satuan == 'buah' ? 'selected' : '' }}>Buah</option>
                    <option value="liter" {{ $sampah->satuan == 'liter' ? 'selected' : '' }}>Liter</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" name="harga" class="form-control" value="{{ $sampah->harga }}" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control">{{ $sampah->deskripsi }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('sampah.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
