<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        if (in_array(Auth::user()->role, $roles)) {
            return $next($request);
        }

        return redirect('/login')->with('error', 'Akses ditolak!');
    }
}
