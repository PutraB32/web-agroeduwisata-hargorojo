<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Validation\Rules\Password as PasswordRule;

class ResetPasswordController extends Controller
{
    /**
     * Tampilkan form untuk menginput password baru.
     */
    public function showResetForm(Request $request, $token = null)
    {
        return view('Admin.reset-password')->with([
            'token' => $token,
            'email' => $request->email
        ]);
    }

    /**
     * Lakukan reset password di database.
     */
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|max:255',
            'password' => ['required', 'confirmed', PasswordRule::min(8)->letters()->numbers()],
        ], [
            'token.required' => 'Token reset tidak valid.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password baru wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak cocok dengan password baru.',
        ]);

        // Melakukan reset password menggunakan Laravel Password Broker
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', 'Password Anda berhasil diperbarui! Silakan masuk dengan password baru.')
            : back()->withErrors(['email' => ['Token reset tidak valid atau sudah kedaluwarsa.']]);
    }
}
