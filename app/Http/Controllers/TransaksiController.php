<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Sampah;
use App\Models\User;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with(['user', 'sampah'])->paginate(10);
        return view('features.transaksi.index', compact('transaksis'));
    }

    public function indexPrint()
    {
        $transaksis = Transaksi::with(['user', 'sampah'])  ->paginate(10); 
        return view('features.transaksi.indexPrint', compact('transaksis'));
    }

    public function create()
    {
        // Ambil hanya user yang memiliki role "user"
        $users = User::where('role', 'user')->get();
        $sampahs = Sampah::all();
        return view('features.transaksi.create', compact('users', 'sampahs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'sampah_id' => 'required|exists:sampahs,id',
            'jumlah' => 'required|integer',
            'status' => 'required|string',
        ]);

        $user = User::findOrFail($request->user_id);
        if ($user->role !== 'user') {
            return redirect()->back()->withErrors(['user_id' => 'ID user harus memiliki role "user".']);
        }

        $sampah = Sampah::findOrFail($request->sampah_id);

        if ($request->status === 'approved') {
            $total_harga = $sampah->harga * $request->jumlah;
        } else {
            $total_harga = 0;
        }

        $validated['total_harga'] = $total_harga;

        $transaksi = Transaksi::create($validated);

        if ($transaksi->status === 'approved') {
            $saldoController = new SaldoController();
            $saldoController->storeSaldo($transaksi);
        }

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dibuat!');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $users = User::where('role', 'user')->get();
        $sampahs = Sampah::all();
        return view('features.transaksi.edit', compact('transaksi', 'users', 'sampahs'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'sampah_id' => 'required|exists:sampahs,id',
            'jumlah' => 'required|integer',
            'status' => 'required|string',
        ]);

        $user = User::findOrFail($request->user_id);
        if ($user->role !== 'user') {
            return redirect()->back()->withErrors(['user_id' => 'ID user harus memiliki role "user".']);
        }

        $sampah = Sampah::findOrFail($request->sampah_id);

        if ($request->status === 'approved') {
            $total_harga = $sampah->harga * $request->jumlah;
        } else {
            $total_harga = 0;
        }

        $validated['total_harga'] = $total_harga;

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($validated);

        if ($transaksi->status === 'approved') {
            $saldoController = new SaldoController();
            $saldoController->storeSaldo($transaksi);
        }

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus!');
    }
}
