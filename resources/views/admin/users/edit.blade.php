@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit User</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name</label>
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
                        <label for="password">Password (leave blank to keep current password)</label>
                        <input type="password" name="password" class="form-control">
                        @error('password')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" class="form-control" required>
                            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin
                            </option>
                            <option value="petugas" {{ old('role', $user->role) == 'petugas' ? 'selected' : '' }}>Petugas
                            </option>
                            <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                        </select>
                        @error('role')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"></i> Update User</button>
                </form>
            </div>
        </div>
    </div>
@endsection
