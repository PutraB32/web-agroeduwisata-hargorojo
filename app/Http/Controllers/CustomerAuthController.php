<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class CustomerAuthController extends Controller
{
    public function showLogin()
    {
        return view('customer.login');
    }

    public function showRegister()
    {
        return view('customer.register');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required'],
        ]);

        $credentials['role'] = 'customer';

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $customer = Auth::user();

            return redirect()->intended(route('ecommerce'))
                ->with('toast_message', 'Selamat datang, '.$customer->name.'!');
        }

        return back()->withErrors([
            'email' => 'Email atau password customer tidak sesuai.',
        ])->onlyInput('email');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'no_hp' => ['nullable', 'string', 'max:20', 'regex:/^[0-9+\-\s()]+$/'],
            'alamat' => ['nullable', 'string', 'max:1000'],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()],
        ], [
            'no_hp.regex' => 'Nomor HP hanya boleh berisi angka, spasi, tanda +, tanda -, dan tanda kurung.',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'no_hp' => $validated['no_hp'] ?? null,
            'alamat' => $validated['alamat'] ?? null,
            'password' => Hash::make($validated['password']),
            'role' => 'customer',
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('ecommerce')
            ->with('success', 'Registrasi berhasil. Silakan lanjut berbelanja.')
            ->with('toast_message', 'Selamat datang, '.$user->name.'!');
    }

    public function updateProfile(Request $request)
    {
        $customer = $request->user();

        if (!$customer) {
            return redirect()->route('customer.login')
                ->with('error', 'Silakan login customer terlebih dahulu.');
        }

        if ($customer->role !== 'customer') {
            abort(403, 'Profil ini hanya bisa diperbarui oleh customer.');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($customer->id),
            ],
            'no_hp' => ['nullable', 'string', 'max:20', 'regex:/^[0-9+\-\s()]+$/'],
            'alamat' => ['nullable', 'string', 'max:1000'],
            'foto' => ['nullable', 'file', 'mimes:jpg,jpeg,png,gif,webp', 'max:5120'],
        ], [
            'no_hp.regex' => 'Nomor HP hanya boleh berisi angka, spasi, tanda +, tanda -, dan tanda kurung.',
            'foto.file' => 'Foto profil harus berupa file gambar.',
            'foto.mimes' => 'Foto profil harus berupa file JPG, JPEG, PNG, GIF, atau WEBP.',
            'foto.max' => 'Ukuran foto profil maksimal 5 MB.',
        ]);

        unset($validated['foto']);

        $customer->fill($validated);

        if ($request->hasFile('foto')) {
            $oldPhoto = $customer->foto;
            $imageName = Str::uuid().'.'.$request->file('foto')->extension();
            $storedPath = $request->file('foto')->storeAs('customer', $imageName, 'public');

            if (!$storedPath) {
                return back()
                    ->withErrors(['foto' => 'Foto profil gagal diunggah. Silakan coba lagi.'])
                    ->withInput();
            }

            $customer->foto = $imageName;

            if ($oldPhoto) {
                Storage::disk('public')->delete('customer/'.$oldPhoto);
            }
        }

        $customer->save();

        return back()
            ->with('success', 'Profil customer berhasil diperbarui.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('ecommerce')
            ->with('toast_message', 'Berhasil keluar. Terima kasih telah berbelanja bersama kami.');
    }
}
