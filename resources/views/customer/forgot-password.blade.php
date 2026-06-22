@extends('layouts.master')

@section('title', 'Lupa Password Customer - Desa Hargorojo')

@section('content')

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
                    <i class="fa-solid fa-key"></i>
                </div>

                <h1 class="font-lora text-3xl font-bold text-[#173121]">Lupa Password</h1>
                <p class="mt-2 text-sm text-[#6b736d]">Masukkan email customer untuk menerima link reset password.</p>
            </div>

            <form action="{{ route('customer.password.email') }}" method="POST" class="space-y-5 px-8 pb-8">
                @csrf

                @include('customer.partials.form-alerts')

                <div>
                    <label class="mb-2 block text-xs font-bold uppercase tracking-widest text-[#173121]">Email Customer</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="h-12 w-full rounded-2xl border border-[#ece6da] px-4 text-sm focus:outline-none focus:ring-2 focus:ring-[#173121]"
                        placeholder="customer@email.com"
                        required
                    >
                </div>

                <button type="submit" class="flex h-12 w-full items-center justify-center gap-2 rounded-2xl bg-[#173121] font-semibold text-white transition-all hover:bg-[#21412f]">
                    Kirim Link Reset
                    <i class="fa-solid fa-paper-plane"></i>
                </button>

                <p class="text-center text-sm text-[#6b736d]">
                    Ingat password?
                    <a href="{{ route('customer.login') }}" class="font-bold text-[#173121] hover:text-[#d8b15a]">Kembali login</a>
                </p>
            </form>
        </div>
    </div>
</section>
@endsection
