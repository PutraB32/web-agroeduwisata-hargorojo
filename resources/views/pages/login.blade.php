<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Desa Hargorojo</title>
    <link rel="icon" type="image/png" href="{{ asset('images/assets foto/logo hargorojo.png') }}?v=20260608-logo">
    @vite(['resources/css/admin.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="admin-auth-page overflow-x-hidden bg-[#12351f] antialiased text-[#12351f] selection:bg-[#12351f] selection:text-white">
    <section class="relative min-h-screen overflow-hidden bg-[#12351f] px-3 py-6 sm:px-6 sm:py-10">
        <img
            src="{{ asset('images/assets foto/hero section-ecommerce.png') }}"
            alt="Produk Desa Hargorojo"
            class="absolute inset-0 h-full w-full object-cover object-center"
        >
        <div class="absolute inset-0" style="background: linear-gradient(180deg, rgba(18, 53, 31, 0.70) 0%, rgba(18, 53, 31, 0.48) 42%, rgba(18, 53, 31, 0.92) 78%, #12351f 100%);"></div>
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
                        <p class="mt-5 text-xs font-extrabold uppercase tracking-[0.22em] text-[#d5ad3d]">Admin Area</p>
                        <h1 class="mt-2 font-lora text-2xl sm:text-3xl font-bold text-white">Selamat Datang</h1>
                        <p class="mt-2 text-sm leading-6 text-white/75">Masuk ke dashboard pengelola Desa Hargorojo.</p>
                    </div>

                    <form action="{{ route('login.post') }}" method="POST" class="mt-8 space-y-4">
                        @csrf

                        @if (session('status'))
                            <div class="rounded-md border border-green-200 bg-green-50 px-4 py-3 text-center text-sm font-medium text-green-700">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="rounded-md border border-red-200 bg-red-50 px-4 py-3 text-center text-sm font-medium text-red-600">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <div>
                            <label class="mb-2 block text-[0.68rem] font-extrabold uppercase tracking-[0.2em] text-white/85">Email Admin</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex w-11 items-center justify-center text-[#8c9488]">
                                    <i class="fa-regular fa-envelope text-sm"></i>
                                </span>
                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    autocomplete="username"
                                    class="h-12 w-full rounded-md border border-[#e5dcc8] bg-[#f7f3ea] pl-11 pr-4 text-sm text-[#12351f] placeholder:text-[#9b978e] shadow-inner shadow-white/60 transition focus:border-[#d5ad3d] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#d5ad3d]/25"
                                    placeholder="admin@hargorojo.id"
                                    required
                                >
                            </div>
                        </div>

                        <div>
                            <label class="mb-2 block text-[0.68rem] font-extrabold uppercase tracking-[0.2em] text-white/85">Password</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex w-11 items-center justify-center text-[#8c9488]">
                                    <i class="fa-solid fa-lock text-sm"></i>
                                </span>
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    autocomplete="current-password"
                                    class="h-12 w-full rounded-md border border-[#e5dcc8] bg-[#f7f3ea] pl-11 pr-12 text-sm text-[#12351f] placeholder:text-[#9b978e] shadow-inner shadow-white/60 transition focus:border-[#d5ad3d] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#d5ad3d]/25"
                                    placeholder="Masukkan password"
                                    required
                                >
                                <button
                                    type="button"
                                    onclick="togglePasswordVisibility('password', 'password-eye')"
                                    class="absolute inset-y-0 right-0 flex w-12 items-center justify-center text-[#8c9488] transition-colors hover:text-[#12351f]"
                                    title="Tampilkan password"
                                    aria-label="Tampilkan password"
                                >
                                    <i class="fa-solid fa-eye" id="password-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="flex flex-col items-start gap-3 pt-1 text-xs sm:flex-row sm:items-center sm:justify-between">
                            <label class="flex items-center gap-2 font-medium text-white/75">
                                <input type="checkbox" name="remember" value="1" class="rounded border-[#e5dcc8] text-[#12351f] focus:ring-[#d5ad3d]">
                                Ingat saya
                            </label>

                            <a href="{{ route('password.request') }}" class="font-extrabold uppercase tracking-[0.12em] text-[#d5ad3d] transition hover:text-white">
                                Lupa Password?
                            </a>
                        </div>

                        <button type="submit" class="group flex h-12 w-full items-center justify-center gap-3 rounded-md bg-[#d5ad3d] text-xs font-extrabold uppercase tracking-[0.18em] text-[#12351f] shadow-[0_14px_28px_rgba(0,0,0,0.22)] transition hover:bg-white focus:outline-none focus:ring-2 focus:ring-[#d5ad3d]/55">
                            Masuk Admin
                            <i class="fa-solid fa-arrow-right text-[#12351f] transition-transform group-hover:translate-x-1"></i>
                        </button>
                    </form>

                    <div class="mt-7 text-center">
                        <a href="{{ route('kontak') }}" class="inline-flex items-center justify-center gap-2 text-xs font-bold text-white/70 transition hover:text-[#d5ad3d]">
                            <i class="fa-solid fa-arrow-left-long text-[#d5ad3d]"></i>
                            Kembali ke Kontak
                        </a>
                    </div>
                </div>

                <div class="border-t border-[#d5ad3d]/30 bg-[#0f2d1b]/70 px-6 py-4 text-center">
                    <p class="text-[0.65rem] font-bold uppercase tracking-[0.22em] text-white/60">&copy; 2026 Desa Agroeduwisata Hargorojo</p>
                </div>
            </div>
        </div>
    </section>

</body>
</html>