<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Jika belum login → redirect ke halaman login admin
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }

        // Jika bukan admin → redirect ke halaman login admin
        if (Auth::user()->role !== 'admin') {
            Auth::logout();
            return redirect()->route('admin.login')
                ->withErrors(['Akses ditolak. Silakan login sebagai admin.']);

        }

        return $next($request);
    }
}