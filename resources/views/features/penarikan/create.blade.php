<!-- resources/views/features/penarikan/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Form Penarikan Saldo untuk {{ $user->name }}</h2>

        <form action="{{ route('penarikan.store') }}" method="POST">
            @csrf
            <input type="hidden" name="saldo_id" value="{{ $saldo->id }}">

            <div class="form-group">
                <label for="jumlah">Jumlah Penarikan:</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control" min="1" required>
            </div>

            <div class="form-group">
                <p>Saldo Tersedia: {{ $saldo->total }}</p>
            </div>

            <button type="submit" class="btn btn-success">Proses Penarikan</button>
        </form>
    </div>
@endsection
