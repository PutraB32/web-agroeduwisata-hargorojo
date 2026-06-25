<?php

namespace App\Http\Controllers;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /**
     * Tampilkan form lupa password.
     */
    public function showLinkRequestForm()
    {
        return view('Admin.forgot-password');
    }

    /**
     * Tampilkan form lupa password customer.
     */
    public function showCustomerLinkRequestForm()
    {
        return view('customer.forgot-password');
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

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status == Password::RESET_LINK_SENT) {
            return back()->with('status', 'Berhasil dikirim! Silakan periksa kotak masuk atau folder spam Anda.');
        }

        return back()->withErrors(['email' => 'Maaf, email tersebut tidak terdaftar di sistem kami.']);
    }

    /**
     * Kirim email token reset password untuk akun customer.
     */
    public function sendCustomerResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
        ]);

        $status = Password::sendResetLink(
            [
                'email' => $request->email,
                'role' => 'customer',
            ],
            function ($user, $token) {
                $user->notify(new ResetPasswordNotification($token, 'customer.password.reset'));
            }
        );

        if ($status == Password::RESET_LINK_SENT) {
            return back()->with('status', 'Berhasil dikirim! Silakan periksa kotak masuk atau folder spam Anda.');
        }

        return back()->withErrors(['email' => 'Maaf, email tersebut tidak terdaftar di sistem kami.']);
    }
}
