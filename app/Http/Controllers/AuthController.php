<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Fungsi untuk memproses login
    public function authenticate(Request $request)
    {
        // 1. Validasi inputan form
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Cek kecocokan di database
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // 3. Cek ROLE dan arahkan ke dashboard yang sesuai
            if (Auth::user()->role === 'super_admin') {
                return redirect()->route('superadmin.dashboard');
            } elseif (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
        }

        // 4. Jika gagal, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    // Fungsi untuk logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
}