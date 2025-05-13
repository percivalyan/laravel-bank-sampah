@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Sampah</h1>
    <a href="{{ route('sampah.create') }}" class="btn btn-primary mb-3">Tambah Sampah</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sampahs as $sampah)
            <tr>
                <td>{{ $sampah->nama }}</td>
                <td>{{ $sampah->satuan }}</td>
                <td>{{ number_format($sampah->harga, 0, ',', '.') }}</td>
                <td>{{ $sampah->deskripsi }}</td>
                <td>
                    <a href="{{ route('sampah.show', $sampah->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('sampah.edit', $sampah->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('sampah.destroy', $sampah->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
