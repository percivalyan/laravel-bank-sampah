<?php

namespace App\Http\Controllers;

use App\Models\Penarikan;
use App\Models\Saldo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenarikanController extends Controller
{
    public function showUsers()
    {
        // Ambil user dengan role 'user' yang memiliki saldo terakhir > 0
        $users = User::where('role', 'user')
            ->whereHas('saldos', function ($query) {
                $query->orderBy('created_at', 'desc')
                    ->limit(1)
                    ->where('total', '>', 0);
            })
            ->get();

        return view('features.penarikan.select_user', compact('users'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $user = User::findOrFail($request->user_id);

        $saldo = Saldo::where('user_id', $user->id)->latest()->first();

        return view('features.penarikan.create', compact('saldo', 'user'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jumlah' => 'required|integer|min:1',
            'saldo_id' => 'required|exists:saldos,id',
        ]);

        $user = Auth::user();
        $saldo = Saldo::findOrFail($validated['saldo_id']);

        if ($saldo->total < $validated['jumlah']) {
            return redirect()->back()->with('error', 'Saldo Anda tidak cukup untuk melakukan penarikan.');
        }

        $saldo->total -= $validated['jumlah'];

        $penarikan = new Penarikan();
        $penarikan->user_id = $user->id;
        $penarikan->saldo_id = $saldo->id;
        $penarikan->jumlah = $validated['jumlah'];
        $penarikan->save();

        $saldo->save();

        return redirect()->route('penarikan.index')->with('success', 'Penarikan saldo berhasil dilakukan!');
    }

    public function index()
    {
        $user = Auth::user();

        $penarikans = Penarikan::with(['saldo'])
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('features.penarikan.index', compact('penarikans'));
    }

    public function indexPrivateUser()
    {
        $userId = Auth::id();

        $penarikans = Penarikan::with(['saldo.user'])
            ->whereHas('saldo.user', function ($query) use ($userId) {
                $query->where('id', $userId)
                    ->where('role', 'user');
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('features.penarikan.riwayat', compact('penarikans'));
    }
}
