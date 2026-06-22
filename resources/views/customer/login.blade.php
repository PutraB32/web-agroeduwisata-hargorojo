@extends('layouts.master')
@section('title', 'Login Customer - Desa Hargorojo')
@section('hideSiteChrome', true)
@section('content')

<section class="relative min-h-screen overflow-hidden bg-[#12351f] px-3 py-6 sm:px-6 sm:py-10">
    <img
        src="{{ asset('images/assets foto/hero section-ecommerce.png') }}"
        alt="Produk Desa Hargorojo"
        class="absolute inset-x-0 top-0 h-[76%] min-h-[34rem] w-full object-cover object-center"
    >
    <div class="absolute inset-0" style="background: linear-gradient(180deg, rgba(18, 53, 31, 0.68) 0%, rgba(18, 53, 31, 0.46) 42%, rgba(18, 53, 31, 0.92) 78%, #12351f 100%);"></div>
    <div class="absolute inset-0" style="background: radial-gradient(circle at 20% 12%, rgba(213, 173, 61, 0.20), transparent 28%), radial-gradient(circle at 84% 22%, rgba(255, 255, 255, 0.20), transparent 30%);"></div>

    <div class="relative z-10 flex min-h-[calc(100vh-3rem)] items-center sm:min-h-[calc(100vh-5rem)] justify-center">
        <div class="w-full max-w-[420px] rounded-lg border border-[#d5ad3d]/45 bg-[#12351f]/95 shadow-[0_28px_80px_rgba(15,45,27,0.34)] backdrop-blur-sm">
            <div class="px-5 pb-6 pt-7 sm:px-9 sm:pb-8 sm:pt-8">
                <div class="text-center">
                    <img
                        src="{{ asset('images/assets foto/logo hargorojo.png') }}"
                        alt="Logo Desa Wisata Hargorojo"
                        class="mx-auto h-auto w-28 sm:w-32 object-contain drop-shadow-[0_16px_28px_rgba(0,0,0,0.34)]"
                    >
                    <p class="mt-5 text-xs font-extrabold uppercase tracking-[0.22em] text-[#d5ad3d]">Customer Area</p>
                    <h1 class="mt-2 font-lora text-2xl sm:text-3xl font-bold text-white">Selamat Datang</h1>
                    <p class="mt-2 text-sm leading-6 text-white/75">Masuk untuk belanja produk lokal Desa Hargorojo.</p>
                </div>

                <form action="{{ route('customer.login.post') }}" method="POST" class="mt-8 space-y-4">
                    @csrf

                    @include('customer.partials.form-alerts')

                    <div>
                        <label class="mb-2 block text-[0.68rem] font-extrabold uppercase tracking-[0.2em] text-white/85">Email Address</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex w-11 items-center justify-center text-[#8c9488]">
                                <i class="fa-regular fa-envelope text-sm"></i>
                            </span>
                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                autocomplete="email"
                                class="h-12 w-full rounded-md border border-[#e5dcc8] bg-[#f7f3ea] pl-11 pr-4 text-sm text-[#12351f] placeholder:text-[#9b978e] shadow-inner shadow-white/60 transition focus:border-[#d5ad3d] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#d5ad3d]/25"
                                placeholder="nama@email.com"
                                required
                            >
                        </div>
                    </div>

                    <div x-data="{ showPassword: false }">
                        <label class="mb-2 block text-[0.68rem] font-extrabold uppercase tracking-[0.2em] text-white/85">Password</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex w-11 items-center justify-center text-[#8c9488]">
                                <i class="fa-solid fa-lock text-sm"></i>
                            </span>
                            <input
                                :type="showPassword ? 'text' : 'password'"
                                type="password"
                                name="password"
                                autocomplete="current-password"
                                class="h-12 w-full rounded-md border border-[#e5dcc8] bg-[#f7f3ea] pl-11 pr-12 text-sm text-[#12351f] placeholder:text-[#9b978e] shadow-inner shadow-white/60 transition focus:border-[#d5ad3d] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#d5ad3d]/25"
                                placeholder="Masukkan password"
                                required
                            >
                            <button
                                type="button"
                                @click="showPassword = !showPassword"
                                :aria-pressed="showPassword.toString()"
                                :title="showPassword ? 'Sembunyikan password' : 'Tampilkan password'"
                                :aria-label="showPassword ? 'Sembunyikan password' : 'Tampilkan password'"
                                class="absolute inset-y-0 right-0 flex w-12 items-center justify-center text-[#8c9488] transition-colors hover:text-[#12351f]"
                                title="Tampilkan password"
                                aria-label="Tampilkan password"
                            >
                                <i :class="showPassword ? 'fa-solid fa-eye-slash' : 'fa-solid fa-eye'"></i>
                            </button>
                        </div>
                    </div>

                    <div class="flex flex-col items-start gap-3 pt-1 text-xs sm:flex-row sm:items-center sm:justify-between">
                        <label class="flex items-center gap-2 font-medium text-white/75">
                            <input type="checkbox" name="remember" value="1" class="rounded border-[#e5dcc8] text-[#12351f] focus:ring-[#d5ad3d]">
                            Ingat saya
                        </label>

                        <a href="{{ route('customer.password.request') }}" class="font-extrabold uppercase tracking-[0.12em] text-[#d5ad3d] transition hover:text-white">
                            Lupa password?
                        </a>
                    </div>

                    <button type="submit" class="group flex h-12 w-full items-center justify-center gap-3 rounded-md bg-[#d5ad3d] text-xs font-extrabold uppercase tracking-[0.18em] text-[#12351f] shadow-[0_14px_28px_rgba(0,0,0,0.22)] transition hover:bg-white focus:outline-none focus:ring-2 focus:ring-[#d5ad3d]/55">
                        Masuk
                        <i class="fa-solid fa-arrow-right text-[#12351f] transition-transform group-hover:translate-x-1"></i>
                    </button>

                    <p class="pt-4 text-center text-xs text-white/70">
                        Belum punya akun?
                        <a href="{{ route('customer.register') }}" class="font-extrabold uppercase tracking-[0.12em] text-[#d5ad3d] hover:text-white">Daftar Sekarang</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
