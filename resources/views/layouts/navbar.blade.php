@if($navbarCustomer)
    <div
        data-order-notification-config
        data-storage-key="{{ $navbar['notificationStorageKey'] }}"
        data-order-updates='@json($navbarOrderUpdates)'
        data-new-order-id="{{ $navbar['newOrderId'] }}"
        hidden
    ></div>
@endif
<nav
    x-data="{ open: false, scrolled: false }"
    x-init="scrolled = window.pageYOffset > 80"
    @scroll.window="scrolled = window.pageYOffset > 80"
    @keydown.escape.window="open = false"
    :class="{ 'is-open': open, 'is-scrolled': scrolled }"
    class="hargo-navbar"
>
    <div class="hargo-navbar__bar">
        <a href="{{ $navbar['brandUrl'] }}" class="hargo-navbar__brand" aria-label="Beranda Desa Hargorojo">
            <img
                src="{{ $navbar['logoUrl'] }}"
                alt="Logo Desa Wisata Hargorojo"
                class="hargo-navbar__logo"
            >
        </a>

        <ul class="hargo-navbar__links" aria-label="Menu utama">
            @foreach($navbar['items'] as $item)
                <li>
                    <a
                        href="{{ $item['url'] }}"
                        class="{{ $item['linkClass'] }}"
                    >
                        {{ $item['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="hargo-navbar__actions">

            @if($navbar['showAdminLoginButton'])
                <a
                    href="{{ $navbar['adminLoginUrl'] }}"
                    class="hargo-navbar__admin-login"
                    title="Login admin"
                    aria-label="Login admin"
                >
                    <i class="fa-solid fa-user-shield text-sm"></i>
                    <span>Login Admin</span>
                </a>
            @endif
            <a href="{{ $navbar['contactUrl'] }}" class="hargo-navbar__contact">
                Kontak
            </a>

            @if($navbarCustomer)
                <form action="{{ $navbar['customerLogoutUrl'] }}" method="POST" class="hidden lg:block">
                    @csrf
                    <button type="submit" class="hargo-navbar__logout">
                        Keluar
                    </button>
                </form>
            @endif

            <button
                type="button"
                @click="open = !open"
                class="hargo-navbar__toggle"
                aria-label="Buka menu navigasi"
                :aria-expanded="open.toString()"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="hargo-navbar__toggle-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        x-show="!open"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-75"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-75"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 7h16M4 12h16M4 17h16"
                    />
                    <path
                        x-show="open"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-75"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-75"
                        x-cloak
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"
                    />
                </svg>
            </button>
        </div>
    </div>

    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="-translate-y-3 opacity-0"
        x-transition:enter-end="translate-y-0 opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="translate-y-0 opacity-100"
        x-transition:leave-end="-translate-y-3 opacity-0"
        x-cloak
        class="hargo-navbar__panel"
    >
        <div class="hargo-navbar__panel-inner">

            @foreach($navbar['items'] as $item)
                <a
                    href="{{ $item['url'] }}"
                    @click="open = false"
                    class="{{ $item['panelClass'] }}"
                >
                    {{ $item['label'] }}
                </a>
            @endforeach


            @if($navbar['showAdminLoginButton'])
                <a href="{{ $navbar['adminLoginUrl'] }}" @click="open = false" class="hargo-navbar__panel-admin-login">
                    <i class="fa-solid fa-user-shield"></i>
                    <span>Login Admin</span>
                </a>
            @endif
            <a href="{{ $navbar['contactUrl'] }}" @click="open = false" class="hargo-navbar__panel-contact">
                Kontak
            </a>

            @if($navbarCustomer)
                <form action="{{ $navbar['customerLogoutUrl'] }}" method="POST">
                    @csrf
                    <button type="submit" class="hargo-navbar__panel-logout">
                        Keluar
                    </button>
                </form>
            @endif
        </div>
    </div>
</nav>

@if($navbar['showAdminReturnButton'])
    <a href="{{ $navbar['dashboardUrl'] }}" class="admin-return-button">
        <i class="fa-solid fa-arrow-left"></i>
        <span>Kembali ke Dashboard</span>
    </a>
@endif
