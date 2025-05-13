@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Profil</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}"
                            required>
                        @error('name')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}"
                            required>
                        @error('email')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password Baru (Opsional)</label>
                        <input type="password" name="password" class="form-control">
                        @error('password')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
