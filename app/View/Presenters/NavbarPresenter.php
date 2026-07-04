<?php

namespace App\View\Presenters;

use App\Models\User;
use Illuminate\Http\Request;

class NavbarPresenter
{
    public static function make(Request $request, ?User $customer, mixed $authUser): array
    {
        return [
            'brandUrl' => route('beranda'),
            'logoUrl' => asset('images/assets foto/logo hargorojo.webp'),
            'contactUrl' => route('kontak'),
            'dashboardUrl' => route('dashboard'),
            'adminLoginUrl' => route('login'),
            'showAdminLoginButton' => $request->routeIs('kontak') && !$customer,
            'items' => self::items($request),
            'customerProfileUrl' => null,
            'customerProfileOrdersUrl' => null,
            'customerLogoutUrl' => $customer ? route('customer.logout') : null,
            'customerProfileButtonClass' => self::profileButtonClass($request),
            'showAdminReturnButton' => self::shouldShowAdminReturnButton($authUser),
            'notificationStorageKey' => $customer
                ? 'hargorojo.orderNotifications.seen.'.$customer->id
                : null,
            'newOrderId' => (int) $request->session()->get('navbar_new_order_id', 0),
        ];
    }

    private static function items(Request $request): array
    {
        return collect([
            ['label' => 'Beranda', 'route' => 'beranda', 'active' => 'beranda'],
            ['label' => 'Profil Desa', 'route' => 'profil', 'active' => 'profil'],
            ['label' => 'Agroeduwisata', 'route' => 'agro', 'active' => 'agro'],
            ['label' => 'Produk', 'route' => 'produk', 'active' => 'produk'],
            ['label' => 'E-Commerce', 'route' => 'ecommerce', 'active' => 'ecommerce'],
            ['label' => 'Katalog Desa', 'route' => 'katalog', 'active' => 'katalog'],
        ])->map(function (array $item) use ($request) {
            $activeClass = $request->routeIs($item['active']) ? ' is-active' : '';

            return [
                'label' => $item['label'],
                'url' => route($item['route']),
                'linkClass' => 'hargo-navbar__link'.$activeClass,
                'panelClass' => 'hargo-navbar__panel-link'.$activeClass,
            ];
        })->all();
    }

    private static function profileButtonClass(Request $request): string
    {
        return 'hargo-navbar__icon-btn hargo-navbar__profile-btn hidden lg:inline-flex';
    }

    private static function shouldShowAdminReturnButton(mixed $authUser): bool
    {
        return in_array($authUser->role ?? null, ['admin', 'super_admin'], true);
    }
}
