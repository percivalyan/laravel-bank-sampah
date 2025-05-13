<!-- resources/views/features/penarikan/select_user.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Pilih User untuk Penarikan Saldo</h2>
        
        <form action="{{ route('penarikan.create') }}" method="GET">
            <div class="form-group">
                <label for="user_id">Pilih User:</label>
                <select class="form-control" id="user_id" name="user_id">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Lanjutkan</button>
        </form>
    </div>
@endsection
