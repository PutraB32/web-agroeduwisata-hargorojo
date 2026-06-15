@extends('layouts.master')

@section('title', 'Reset Password Customer - Desa Hargorojo')

@section('content')
@include('layouts.navbar')

<section class="relative min-h-screen overflow-hidden bg-[#f8f6f1] pt-32 pb-16">
    <img
        src="{{ asset('images/assets foto/hero section-ecommerce.png') }}"
        alt="Produk Desa Hargorojo"
        class="absolute inset-0 h-full w-full object-cover"
    >
    <div class="absolute inset-0 bg-[#07150f]/70"></div>

    <div class="relative z-10 mx-auto w-full max-w-md px-6">
        <div class="rounded-[28px] border border-white/20 bg-white shadow-[0_25px_70px_rgba(0,0,0,0.20)]">
            <div class="px-8 py-8 text-center">
                <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-[#173121] text-[#d8b15a]">
                    <i class="fa-solid fa-lock-open"></i>
                </div>

                <h1 class="font-lora text-3xl font-bold text-[#173121]">Password Baru</h1>
                <p class="mt-2 text-sm text-[#6b736d]">Buat password baru untuk akun customer Anda.</p>
            </div>

            <form action="{{ route('customer.password.update') }}" method="POST" class="space-y-5 px-8 pb-8">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email ?? old('email') }}">

                @include('customer.partials.form-alerts')

                <div>
                    <label class="mb-2 block text-xs font-bold uppercase tracking-widest text-[#173121]">Email</label>
                    <input
                        type="email"
                        value="{{ $email ?? old('email') }}"
                        autocomplete="email"
                        class="h-12 w-full rounded-2xl border border-[#ece6da] bg-[#f8f6f1] px-4 text-sm text-[#6b736d] focus:outline-none"
                        disabled
                    >
                </div>

                <div x-data="{ showPassword: false }">
                    <label class="mb-2 block text-xs font-bold uppercase tracking-widest text-[#173121]">Password Baru</label>
                    <div class="relative">
                        <input
                            :type="showPassword ? 'text' : 'password'"
                            type="password"
                            name="password"
                            minlength="8"
                            autocomplete="new-password"
                            class="h-12 w-full rounded-2xl border border-[#ece6da] px-4 pr-12 text-sm focus:outline-none focus:ring-2 focus:ring-[#173121]"
                            placeholder="Minimal 8 karakter"
                            required
                        >
                        <button
                            type="button"
                            @click="showPassword = !showPassword"
                            :aria-pressed="showPassword.toString()"
                            :title="showPassword ? 'Sembunyikan password' : 'Tampilkan password'"
                            :aria-label="showPassword ? 'Sembunyikan password' : 'Tampilkan password'"
                            class="absolute inset-y-0 right-0 flex w-12 items-center justify-center text-[#6b736d] transition-colors hover:text-[#173121]"
                            title="Tampilkan password"
                            aria-label="Tampilkan password"
                        >
                            <i :class="showPassword ? 'fa-solid fa-eye-slash' : 'fa-solid fa-eye'"></i>
                        </button>
                    </div>
                    <p class="mt-2 text-xs leading-relaxed text-[#6b736d]">
                        Minimal 8 karakter, gunakan kombinasi huruf dan angka.
                    </p>
                </div>

                <div x-data="{ showPasswordConfirmation: false }">
                    <label class="mb-2 block text-xs font-bold uppercase tracking-widest text-[#173121]">Konfirmasi Password</label>
                    <div class="relative">
                        <input
                            :type="showPasswordConfirmation ? 'text' : 'password'"
                            type="password"
                            name="password_confirmation"
                            minlength="8"
                            autocomplete="new-password"
                            class="h-12 w-full rounded-2xl border border-[#ece6da] px-4 pr-12 text-sm focus:outline-none focus:ring-2 focus:ring-[#173121]"
                            placeholder="Ulangi password baru"
                            required
                        >
                        <button
                            type="button"
                            @click="showPasswordConfirmation = !showPasswordConfirmation"
                            :aria-pressed="showPasswordConfirmation.toString()"
                            :title="showPasswordConfirmation ? 'Sembunyikan password' : 'Tampilkan password'"
                            :aria-label="showPasswordConfirmation ? 'Sembunyikan password' : 'Tampilkan password'"
                            class="absolute inset-y-0 right-0 flex w-12 items-center justify-center text-[#6b736d] transition-colors hover:text-[#173121]"
                            title="Tampilkan password"
                            aria-label="Tampilkan password"
                        >
                            <i :class="showPasswordConfirmation ? 'fa-solid fa-eye-slash' : 'fa-solid fa-eye'"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="flex h-12 w-full items-center justify-center gap-2 rounded-2xl bg-[#173121] font-semibold text-white transition-all hover:bg-[#21412f]">
                    Perbarui Password
                    <i class="fa-solid fa-check"></i>
                </button>

                <p class="text-center text-sm text-[#6b736d]">
                    Batal reset?
                    <a href="{{ route('customer.login') }}" class="font-bold text-[#173121] hover:text-[#d8b15a]">Kembali login</a>
                </p>
            </form>
        </div>
    </div>
</section>
@endsection
