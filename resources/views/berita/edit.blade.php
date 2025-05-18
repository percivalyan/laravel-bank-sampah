@extends('layouts.app')

@section('title', 'Edit Berita')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Berita</h1>

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

                <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title">Judul *</label>
                        <input type="text" name="title" id="title" class="form-control"
                            value="{{ old('title', $berita->title) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="subtitle">Subjudul</label>
                        <input type="text" name="subtitle" id="subtitle" class="form-control"
                            value="{{ old('subtitle', $berita->subtitle) }}">
                    </div>

                    <div class="form-group">
                        <label for="summary">Ringkasan</label>
                        <textarea name="summary" id="summary" class="form-control" rows="3">{{ old('summary', $berita->summary) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="content">Isi Berita</label>
                        <textarea name="content" id="content" class="form-control" rows="6">{{ old('content', $berita->content) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="photo">Foto Berita</label>
                        @if ($berita->photo)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $berita->photo) }}" alt="Foto Berita"
                                    style="max-width: 200px;" class="img-thumbnail">
                            </div>
                        @endif
                        <input type="file" name="photo" id="photo" class="form-control-file" accept="image/*">
                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"></i> Perbarui</button>
                    <a href="{{ route('berita.index') }}" class="btn btn-secondary mt-2">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
