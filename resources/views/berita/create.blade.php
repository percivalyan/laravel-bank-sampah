@extends('layouts.app')

@section('title', 'Tambah Berita Baru')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Tambah Berita Baru</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title">Judul *</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="subtitle">Subjudul</label>
                        <input type="text" name="subtitle" id="subtitle" class="form-control"
                            value="{{ old('subtitle') }}">
                    </div>

                    <div class="form-group">
                        <label for="summary">Ringkasan</label>
                        <textarea name="summary" id="summary" class="form-control" rows="3">{{ old('summary') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="content">Isi Berita</label>
                        <textarea name="content" id="content" class="form-control" rows="6">{{ old('content') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="photo">Foto Berita</label>
                        <input type="file" name="photo" id="photo" class="form-control-file" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"></i> Simpan</button>
                    <a href="{{ route('berita.index') }}" class="btn btn-secondary mt-2">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
