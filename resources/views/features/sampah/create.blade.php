@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Sampah</h1>

        <form action="{{ route('sampah.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Sampah</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
            </div>
            <div class="mb-3">
                <label for="satuan" class="form-label">Satuan</label>
                <select name="satuan" class="form-select" required>
                    <option value="kg" {{ old('satuan') == 'kg' ? 'selected' : '' }}>Kilogram (kg)</option>
                    <option value="buah" {{ old('satuan') == 'buah' ? 'selected' : '' }}>Buah</option>
                    <option value="liter" {{ old('satuan') == 'liter' ? 'selected' : '' }}>Liter</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" name="harga" class="form-control" value="{{ old('harga') }}" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control">{{ old('deskripsi') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('sampah.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
