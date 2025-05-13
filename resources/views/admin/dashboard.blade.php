@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <h2>Admin Dashboard</h2>
    <p>Welcome, {{ Auth::user()->name }}</p>
    <p>Total Users: {{ \App\Models\User::count() }}</p>
    <a href="{{ route('logout') }}">Logout</a>
@endsection
