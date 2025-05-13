@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Transaksi</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <button class="btn btn-secondary mb-3" onclick="printTable()">Print</button>

    <div id="printArea">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Sampah</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksis as $transaksi)
                <tr>
                    <td>{{ $transaksi->id }}</td>
                    <td>{{ $transaksi->user->name }}</td>
                    <td>{{ $transaksi->sampah->nama }}</td>
                    <td>{{ $transaksi->jumlah }}</td>
                    <td>{{ number_format($transaksi->total_harga, 2) }}</td>
                    <td>{{ $transaksi->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
function printTable() {
    var printContents = document.getElementById("printArea").innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    location.reload(); // reload agar tampilan normal kembali setelah print
}
</script>
@endsection
