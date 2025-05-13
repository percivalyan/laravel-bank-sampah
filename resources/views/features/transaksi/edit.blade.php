@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Transaksi</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Input User -->
            <div class="form-group">
                <label for="user_id">User</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}"
                            {{ old('user_id', $transaksi->user_id) == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Input Sampah -->
            <div class="form-group">
                <label for="sampah_id">Sampah</label>
                <select name="sampah_id" id="sampah_id" class="form-control">
                    @foreach ($sampahs as $sampah)
                        <option value="{{ $sampah->id }}"
                            {{ old('sampah_id', $transaksi->sampah_id) == $sampah->id ? 'selected' : '' }}>
                            {{ $sampah->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Input Jumlah -->
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control"
                    value="{{ old('jumlah', $transaksi->jumlah) }}" required>
            </div>

            <!-- Dropdown Status -->
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="pending" {{ old('status', $transaksi->status) == 'pending' ? 'selected' : '' }}>Pending
                    </option>
                    <option value="approved" {{ old('status', $transaksi->status) == 'approved' ? 'selected' : '' }}>
                        Approved</option>
                    <option value="rejected" {{ old('status', $transaksi->status) == 'rejected' ? 'selected' : '' }}>
                        Rejected</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Transaksi</button>
        </form>
    </div>
@endsection
