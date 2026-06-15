<?php

namespace App\View\Presenters;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CustomerProfilePresenter
{
    public static function make(User $customer, Collection $orders, Request $request): array
    {
        $fallbackProductImageUrl = asset('images/beranda.bg.jpeg');
        $orderRows = CustomerOrderPresenter::collection($orders, null, $fallbackProductImageUrl);
        $selectedOrderId = $request->query('order') ? (int) $request->query('order') : null;
        $editingProfileOnLoad = (bool) $request->session()->get('errors');
        $requestedPanel = $request->query('panel') === 'orders' || $selectedOrderId
            ? 'orders'
            : ($editingProfileOnLoad ? 'profile' : 'dashboard');
        $totalBelanja = (float) $customer->orders()
            ->where('payment_status', 'paid')
            ->sum('total');

        return [
            'customer' => [
                'name' => $customer->name,
                'email' => $customer->email,
                'phoneLabel' => $customer->no_hp ?: 'Belum diisi',
                'addressLabel' => $customer->alamat ?: 'Belum diisi',
                'initials' => self::makeInitials($customer->name),
                'photoUrl' => self::photoUrl($customer),
            ],
            'summary' => [
                'totalOrders' => $customer->orders()->count(),
                'totalBelanja' => $totalBelanja,
                'totalBelanjaFormatted' => self::formatCurrency($totalBelanja),
                'shownOrdersLabel' => $orderRows->count().' ditampilkan',
                'hasOrders' => $orderRows->isNotEmpty(),
            ],
            'tabs' => self::tabs(),
            'orders' => $orderRows,
            'latestOrder' => $orderRows->first(),
            'fallbackProductImageUrl' => $fallbackProductImageUrl,
            'requestedPanel' => $requestedPanel,
            'selectedOrderId' => $selectedOrderId,
            'editingProfileOnLoad' => $editingProfileOnLoad,
        ];
    }

    public static function photoUrl(User $customer): ?string
    {
        return $customer->foto ? asset('storage/customer/'.$customer->foto) : null;
    }

    private static function tabs(): array
    {
        return [
            [
                'id' => 'dashboard',
                'label' => 'Dashboard',
                'icon' => 'fa-solid fa-gauge-high',
                'iconClass' => 'bg-[#d8b15a] text-[#173121]',
            ],
            [
                'id' => 'profile',
                'label' => 'Profil',
                'icon' => 'fa-solid fa-user',
                'iconClass' => 'bg-[#d8b15a] text-[#173121]',
            ],
            [
                'id' => 'orders',
                'label' => 'Total Pesanan',
                'icon' => 'fa-solid fa-bag-shopping',
                'iconClass' => 'bg-[#fff4df] text-[#b47a22]',
            ],
        ];
    }

    private static function makeInitials(string $name): string
    {
        $parts = preg_split('/\s+/', trim($name));

        return collect($parts)
            ->filter()
            ->take(2)
            ->map(fn ($part) => strtoupper(substr($part, 0, 1)))
            ->implode('') ?: 'C';
    }

    private static function formatCurrency(float $value): string
    {
        return 'Rp'.number_format($value, 0, ',', '.');
    }
}
