@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Transaksi</h1>

        <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf
            <!-- Input User -->
            <div class="form-group">
                <label for="user_id">User</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Input Sampah -->
            <div class="form-group">
                <label for="sampah_id">Sampah</label>
                <select name="sampah_id" id="sampah_id" class="form-control">
                    @foreach ($sampahs as $sampah)
                        <option value="{{ $sampah->id }}">{{ $sampah->nama }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Input Jumlah -->
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control" required>
            </div>

            <!-- Dropdown Status -->
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="pending">Pending</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create Transaksi</button>
        </form>
    </div>
@endsection
