<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /**
     * Tampilkan form lupa password.
     */
    public function showLinkRequestForm()
    {
        return view('pages.forgot-password');
    }

    /**
     * Kirim email token reset password ke pengguna jika email terdaftar.
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
        ]);

        Password::sendResetLink(
            $request->only('email')
        );

        return back()->with(
            'status',
            'Jika email terdaftar, tautan ganti password akan dikirim. Silakan periksa kotak masuk Anda.'
        );
    }
}
