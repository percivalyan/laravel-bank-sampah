<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Arahkan berdasarkan role
            switch ($user->role) {
                case 'admin':
                    return redirect('/admin/dashboard');
                case 'ketua':
                    return redirect('/ketua/dashboard');
                case 'bendahara':
                    return redirect('/bendahara/dashboard');
                case 'petugas':
                    return redirect('/petugas/dashboard');
                case 'user':
                default:
                    return redirect('/user/dashboard');
            }
        }

        return redirect()->back()->withErrors(['error' => 'Login gagal! Email atau password salah.']);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        Auth::login($user);

        return redirect('/user/dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
