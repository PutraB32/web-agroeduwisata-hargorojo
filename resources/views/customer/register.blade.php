@extends('layouts.master')

@section('title', 'Daftar Customer - Desa Hargorojo')
@section('hideSiteChrome', true)

@section('content')
<section class="relative min-h-screen overflow-hidden bg-[#12351f] px-3 py-5 sm:px-6 sm:py-8 lg:py-12">
    <div class="absolute inset-0" style="background: radial-gradient(circle at 10% 10%, rgba(213, 173, 61, 0.18), transparent 28%), radial-gradient(circle at 92% 16%, rgba(255, 255, 255, 0.10), transparent 30%), linear-gradient(180deg, #12351f 0%, #0f2d1b 56%, #12351f 100%);"></div>

    <div class="relative z-10 mx-auto flex min-h-[calc(100vh-2.5rem)] max-w-6xl sm:min-h-[calc(100vh-4rem)] items-center justify-center">
        <div class="grid w-full overflow-hidden rounded-lg border border-[#d5ad3d]/45 bg-[#12351f]/95 shadow-[0_28px_80px_rgba(0,0,0,0.30)] backdrop-blur-sm md:grid-cols-[0.96fr_1.04fr]">
            <div class="bg-[#12351f]/95 px-5 py-6 sm:px-8 sm:py-7 lg:px-10 lg:py-9">
                <img
                    src="{{ asset('images/assets foto/logo hargorojo.png') }}"
                    alt="Logo Desa Wisata Hargorojo"
                    class="h-auto w-28 object-contain sm:w-36 drop-shadow-[0_16px_28px_rgba(0,0,0,0.34)]"
                >

                <div class="mt-5 max-w-md sm:mt-7">
                    <p class="text-xs font-extrabold uppercase tracking-[0.22em] text-[#d5ad3d]">Akun Customer</p>
                    <h1 class="mt-2 font-lora text-2xl font-bold leading-tight text-white sm:text-4xl">Gabung Bersama Hargorojo</h1>
                    <p class="mt-3 text-sm leading-6 text-white/75">Buat akun untuk checkout produk lokal dan menyimpan data pengiriman Anda.</p>
                </div>

                <form action="{{ route('customer.register.post') }}" method="POST" class="mt-6 space-y-4 sm:mt-7">
                    @csrf

                    @include('customer.partials.form-alerts')

                    <div>
                        <label class="mb-2 block text-[0.68rem] font-extrabold uppercase tracking-[0.2em] text-white/85">Nama Lengkap</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex w-11 items-center justify-center text-[#d5ad3d]">
                                <i class="fa-regular fa-user text-sm"></i>
                            </span>
                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                autocomplete="name"
                                class="h-11 w-full rounded-md border border-[#e5dcc8] bg-[#f7f3ea] pl-11 pr-4 text-sm text-[#12351f] placeholder:text-[#9b978e] shadow-inner shadow-white/60 transition focus:border-[#d5ad3d] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#d5ad3d]/25"
                                placeholder="Nama lengkap"
                                required
                            >
                        </div>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-[0.68rem] font-extrabold uppercase tracking-[0.2em] text-white/85">Email Address</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex w-11 items-center justify-center text-[#d5ad3d]">
                                    <i class="fa-regular fa-envelope text-sm"></i>
                                </span>
                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    autocomplete="email"
                                    class="h-11 w-full rounded-md border border-[#e5dcc8] bg-[#f7f3ea] pl-11 pr-4 text-sm text-[#12351f] placeholder:text-[#9b978e] shadow-inner shadow-white/60 transition focus:border-[#d5ad3d] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#d5ad3d]/25"
                                    placeholder="nama@email.com"
                                    required
                                >
                            </div>
                        </div>

                        <div>
                            <label class="mb-2 block text-[0.68rem] font-extrabold uppercase tracking-[0.2em] text-white/85">Nomor HP</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex w-11 items-center justify-center text-[#d5ad3d]">
                                    <i class="fa-solid fa-phone text-sm"></i>
                                </span>
                                <input
                                    type="text"
                                    name="no_hp"
                                    value="{{ old('no_hp') }}"
                                    autocomplete="tel"
                                    class="h-11 w-full rounded-md border border-[#e5dcc8] bg-[#f7f3ea] pl-11 pr-4 text-sm text-[#12351f] placeholder:text-[#9b978e] shadow-inner shadow-white/60 transition focus:border-[#d5ad3d] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#d5ad3d]/25"
                                    placeholder="08123456789"
                                >
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-[0.68rem] font-extrabold uppercase tracking-[0.2em] text-white/85">Alamat</label>
                        <div class="relative">
                            <span class="absolute left-0 top-0 flex h-11 w-11 items-center justify-center text-[#d5ad3d]">
                                <i class="fa-solid fa-location-dot text-sm"></i>
                            </span>
                            <textarea
                                name="alamat"
                                rows="2"
                                autocomplete="street-address"
                                class="w-full rounded-md border border-[#e5dcc8] bg-[#f7f3ea] py-3 pl-11 pr-4 text-sm text-[#12351f] placeholder:text-[#9b978e] shadow-inner shadow-white/60 transition focus:border-[#d5ad3d] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#d5ad3d]/25"
                                placeholder="Alamat pengiriman utama"
                            >{{ old('alamat') }}</textarea>
                        </div>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div x-data="{ showPassword: false }">
                            <label class="mb-2 block text-[0.68rem] font-extrabold uppercase tracking-[0.2em] text-white/85">Password</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex w-11 items-center justify-center text-[#d5ad3d]">
                                    <i class="fa-solid fa-lock text-sm"></i>
                                </span>
                                <input
                                    :type="showPassword ? 'text' : 'password'"
                                    type="password"
                                    name="password"
                                    minlength="8"
                                    autocomplete="new-password"
                                    class="h-11 w-full rounded-md border border-[#e5dcc8] bg-[#f7f3ea] pl-11 pr-11 text-sm text-[#12351f] placeholder:text-[#9b978e] shadow-inner shadow-white/60 transition focus:border-[#d5ad3d] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#d5ad3d]/25"
                                    placeholder="Minimal 8 karakter"
                                    required
                                >
                                <button
                                    type="button"
                                    @click="showPassword = !showPassword"
                                    :aria-pressed="showPassword.toString()"
                                    :title="showPassword ? 'Sembunyikan password' : 'Tampilkan password'"
                                    :aria-label="showPassword ? 'Sembunyikan password' : 'Tampilkan password'"
                                    class="absolute inset-y-0 right-0 flex w-11 items-center justify-center text-[#8c9488] transition-colors hover:text-[#12351f]"
                                    title="Tampilkan password"
                                    aria-label="Tampilkan password"
                                >
                                    <i :class="showPassword ? 'fa-solid fa-eye-slash' : 'fa-solid fa-eye'"></i>
                                </button>
                            </div>
                        </div>

                        <div x-data="{ showPasswordConfirmation: false }">
                            <label class="mb-2 block text-[0.68rem] font-extrabold uppercase tracking-[0.2em] text-white/85">Konfirmasi</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex w-11 items-center justify-center text-[#d5ad3d]">
                                    <i class="fa-solid fa-shield-halved text-sm"></i>
                                </span>
                                <input
                                    :type="showPasswordConfirmation ? 'text' : 'password'"
                                    type="password"
                                    name="password_confirmation"
                                    minlength="8"
                                    autocomplete="new-password"
                                    class="h-11 w-full rounded-md border border-[#e5dcc8] bg-[#f7f3ea] pl-11 pr-11 text-sm text-[#12351f] placeholder:text-[#9b978e] shadow-inner shadow-white/60 transition focus:border-[#d5ad3d] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#d5ad3d]/25"
                                    placeholder="Ulangi password"
                                    required
                                >
                                <button
                                    type="button"
                                    @click="showPasswordConfirmation = !showPasswordConfirmation"
                                    :aria-pressed="showPasswordConfirmation.toString()"
                                    :title="showPasswordConfirmation ? 'Sembunyikan password' : 'Tampilkan password'"
                                    :aria-label="showPasswordConfirmation ? 'Sembunyikan password' : 'Tampilkan password'"
                                    class="absolute inset-y-0 right-0 flex w-11 items-center justify-center text-[#8c9488] transition-colors hover:text-[#12351f]"
                                    title="Tampilkan password"
                                    aria-label="Tampilkan password"
                                >
                                    <i :class="showPasswordConfirmation ? 'fa-solid fa-eye-slash' : 'fa-solid fa-eye'"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <p class="text-xs leading-5 text-white/70">Password wajib minimal 8 karakter dan memuat huruf serta angka.</p>

                    <button type="submit" class="group flex h-12 w-full items-center justify-center gap-3 rounded-md bg-[#d5ad3d] text-xs font-extrabold uppercase tracking-[0.18em] text-[#12351f] shadow-[0_14px_28px_rgba(0,0,0,0.22)] transition hover:bg-white focus:outline-none focus:ring-2 focus:ring-[#d5ad3d]/55">
                        Daftar
                        <i class="fa-solid fa-arrow-right text-[#12351f] transition-transform group-hover:translate-x-1"></i>
                    </button>

                    <p class="text-center text-xs text-white/70">
                        Sudah punya akun?
                        <a href="{{ route('customer.login') }}" class="font-extrabold uppercase tracking-[0.12em] text-[#d5ad3d] hover:text-white">Masuk di sini</a>
                    </p>
                </form>
            </div>

            <aside class="relative hidden min-h-[42rem] overflow-hidden bg-[#0f2d1b] p-8 md:flex lg:p-10">
                <img
                    src="{{ asset('images/assets foto/hero section-ecommerce.png') }}"
                    alt="Produk gula kelapa Hargorojo"
                    class="absolute inset-0 h-full w-full object-cover opacity-25"
                >
                <div class="absolute inset-0" style="background: linear-gradient(145deg, rgba(18, 53, 31, 0.96), rgba(15, 45, 27, 0.82) 54%, rgba(213, 173, 61, 0.34));"></div>

                <div class="relative flex h-full w-full flex-col items-center justify-center text-white">
                    <div class="relative w-full max-w-[19rem]">
                        <div class="overflow-hidden rounded-[2rem] border border-[#d5ad3d]/60 bg-white/10 p-3 shadow-[0_24px_60px_rgba(0,0,0,0.28)]">
                            <img
                                src="{{ asset('images/assets foto/content_pohon kelapa.png') }}"
                                alt="Pohon kelapa Desa Hargorojo"
                                class="aspect-[3/4] w-full rounded-[1.55rem] object-cover"
                            >
                        </div>

                        <div class="absolute -bottom-5 -right-5 w-56 rounded-lg border border-[#d5ad3d]/35 bg-[#12351f] px-4 py-3 text-white shadow-[0_18px_36px_rgba(0,0,0,0.24)]">
                            <div class="flex items-start gap-3">
                                <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#d5ad3d]/20 text-[#d5ad3d]">
                                    <i class="fa-solid fa-leaf"></i>
                                </span>
                                <div>
                                    <p class="text-xs font-extrabold uppercase tracking-[0.12em] text-[#d5ad3d]">Produk Lokal</p>
                                    <p class="mt-1 text-[0.72rem] leading-4 text-white/70">Dari kebun, tradisi, dan tangan warga Hargorojo.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-14 max-w-sm text-center">
                        <p class="text-xs font-extrabold uppercase tracking-[0.24em] text-[#d5ad3d]">Desa Wisata Hargorojo</p>
                        <p class="mt-3 font-lora text-3xl font-bold leading-tight">Belanja produk desa dengan lebih mudah.</p>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>
@endsection