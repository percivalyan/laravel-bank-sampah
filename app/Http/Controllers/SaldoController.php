<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaldoController extends Controller
{
    public function index()
    {
        $saldos = Saldo::with('user')->whereHas('user', function ($query) {
            $query->where('role', 'user');
        })->get();

        return view('features.saldo.index', compact('saldos'));
    }

    public function storeSaldo(Transaksi $transaksi)
    {
        if ($transaksi->user->role === 'user') {
            $latestSaldo = Saldo::where('user_id', $transaksi->user_id)
                ->latest()
                ->first();

            if ($latestSaldo) {
                if ($transaksi->status === 'approved') {
                    $totalBaru = $latestSaldo->total + $transaksi->total_harga;
                } else {
                    $totalBaru = $latestSaldo->total;
                }

                Saldo::create([
                    'user_id' => $transaksi->user_id,
                    'sampah_id' => $transaksi->sampah_id,
                    'transaksi_id' => $transaksi->id,
                    'total' => $totalBaru,
                ]);
            } else {
                Saldo::create([
                    'user_id' => $transaksi->user_id,
                    'sampah_id' => $transaksi->sampah_id,
                    'transaksi_id' => $transaksi->id,
                    'total' => $transaksi->total_harga,
                ]);
            }
        }
    }

    public function show($userId)
    {
        $saldo = Saldo::with('user')
            ->whereHas('user', function ($query) {
                $query->where('role', 'user');
            })
            ->where('user_id', $userId)
            ->latest()
            ->first();

        if (!$saldo) {
            return redirect()->back()->with('error', 'Saldo tidak ditemukan.');
        }

        return view('features.saldo.show', compact('saldo'));
    }

    public function indexNow()
    {
        $latestSaldos = Saldo::with(['user', 'sampah', 'transaksi'])
            ->whereHas('user', function ($query) {
                $query->where('role', 'user');
            })
            ->orderBy('created_at', 'desc')
            ->get()
            ->unique('user_id')
            ->values();

        return view('features.saldo.index_now', compact('latestSaldos'));
    }

    public function indexNowPrint()
    {
        $latestSaldos = Saldo::with(['user', 'sampah', 'transaksi'])
            ->whereHas('user', function ($query) {
                $query->where('role', 'user');
            })
            ->orderBy('created_at', 'desc')
            ->get()
            ->unique('user_id')
            ->values();

        return view('features.saldo.index_now_print', compact('latestSaldos'));
    }

    public function indexPrivate()
    {
        $user = Auth::user();

        if ($user->role !== 'user') {
            return redirect()->back()->with('error', 'Akses ditolak.');
        }

        $saldo = Saldo::with(['sampah', 'transaksi'])
            ->where('user_id', $user->id)
            ->latest()
            ->first();

        if (!$saldo) {
            return view('features.saldo.private', ['saldo' => null])
                ->with('message', 'Belum ada data saldo.');
        }

        return view('features.saldo.private', compact('saldo'));
    }
}
