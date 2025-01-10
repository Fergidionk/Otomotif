<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user sudah login dan emailnya adalah admin@example.com
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            return $next($request);
        }
        
        // Jika bukan admin, redirect ke halaman utama
        return redirect('/')->with('error', 'Akses ditolak. Anda tidak memiliki izin admin.');
    }
}
