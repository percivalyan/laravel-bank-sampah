@extends('layouts.app')

@section('title', 'Create New User')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Create New User</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" required>
                        @error('password')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" class="form-control" required>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="petugas" {{ old('role') == 'petugas' ? 'selected' : '' }}>Petugas</option>
                            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                        </select>
                        @error('role')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"></i> Create User</button>
                </form>
            </div>
        </div>
    </div>
@endsection
