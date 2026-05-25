<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
        public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // 1. Pastikan pengguna sudah login terlebih dahulu
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // 2. Cek apakah role pengguna saat ini terdaftar
        if (!in_array(Auth::user()->role, $roles)) {
            abort(403, 'Akses Ditolak: Peran akun Anda tidak memiliki hak akses untuk halaman atau aksi ini.');
        }

        return $next($request);
    }
}
