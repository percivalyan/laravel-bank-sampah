@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Berita</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('berita.update', $berita->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Judul *</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $berita->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="subtitle" class="form-label">Subjudul</label>
            <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ old('subtitle', $berita->subtitle) }}">
        </div>

        <div class="mb-3">
            <label for="summary" class="form-label">Ringkasan</label>
            <textarea name="summary" id="summary" class="form-control" rows="3">{{ old('summary', $berita->summary) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Isi Berita</label>
            <textarea name="content" id="content" class="form-control" rows="6">{{ old('content', $berita->content) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('berita.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
