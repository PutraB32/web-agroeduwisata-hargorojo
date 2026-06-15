@extends('layouts.master')

@section('title', 'Dashboard Customer - Desa Hargorojo')

@section('content')
@include('layouts.navbar')

<section class="relative min-h-screen overflow-hidden bg-[#f8f6f1] pt-32 pb-16">
    <img
        src="{{ asset('images/assets foto/hero section-ecommerce.png') }}"
        alt="Produk Desa Hargorojo"
        class="absolute inset-0 h-[420px] w-full object-cover"
    >
    <div class="absolute inset-x-0 top-0 h-[420px] bg-[#07150f]/75"></div>
    <div class="absolute inset-x-0 top-[300px] h-40 bg-gradient-to-b from-transparent to-[#f8f6f1]"></div>

    <div class="relative z-10 mx-auto max-w-7xl px-6 lg:px-10">
        @include('customer.profile.partials.header')
        @include('customer.profile.partials.alerts')

        <div
            x-data='{
                activePanel: @json($profile['requestedPanel']),
                editingProfile: @json($profile['editingProfileOnLoad'])
            }'
            x-init="
                const selectedOrderId = @json($profile['selectedOrderId']);
                if (selectedOrderId) {
                    $nextTick(() => document.getElementById(`customer-order-${selectedOrderId}`)?.scrollIntoView({ behavior: 'smooth', block: 'start' }));
                }
            "
            class="mt-10 space-y-6"
        >
            @include('customer.profile.partials.tabs')
            @include('customer.profile.partials.dashboard')
            @include('customer.profile.partials.account')
            @include('customer.profile.partials.orders')
        </div>
    </div>
</section>
@endsection
