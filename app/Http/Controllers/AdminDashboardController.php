<?php

namespace App\Http\Controllers;

use App\Models\Agroeduwisata;
use App\Models\KategoriKatalog;
use App\Models\KatalogDesa;
use App\Models\Order;
use App\Models\Produk;
use App\Models\Testimoni;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function redirectByRole(): RedirectResponse
    {
        if (auth()->user()->role === 'super_admin') {
            return redirect()->route('superadmin.dashboard');
        }

        return redirect()->route('admin.dashboard');
    }

    public function superAdmin(Request $request): View
    {
        return view('Admin.superAdmin', array_merge(
            $this->dashboardData($request),
            ['users' => $this->users($request)]
        ));
    }

    public function admin(Request $request): View
    {
        return view('Admin.admin', $this->dashboardData($request));
    }

    private function dashboardData(Request $request): array
    {
        [$chartLabels, $chartData] = $this->salesChartData();
        $chartColors = $this->chartColors(count($chartLabels));

        return [
            'produks' => $this->products($request),
            'agroeduwisatas' => $this->agroeduwisatas($request),
            'katalogs' => $this->katalogs($request),
            'testimoni' => $this->testimonials($request),
            'orders' => $this->orders($request),
            'kategoriKatalogs' => KategoriKatalog::all(),
            'chartLabels' => $chartLabels,
            'chartData' => $chartData,
            'chartColors' => $chartColors,
            'parentAgros' => Agroeduwisata::whereNull('parent_id')->get(),
            'dashboardStats' => $this->dashboardStats(),
        ];
    }

    private function products(Request $request)
    {
        return Produk::when($request->query('search_produk'), function ($query, $search) {
            return $query->where('nama', 'like', "%{$search}%");
        })->get();
    }

    private function agroeduwisatas(Request $request)
    {
        return Agroeduwisata::when($request->query('search_agro'), function ($query, $search) {
            return $query->where('Judul', 'like', "%{$search}%");
        })->when($request->query('filter_kat_agro') === 'induk', function ($query) {
            return $query->whereNull('parent_id');
        })->when($request->query('filter_kat_agro') === 'anak', function ($query) {
            return $query->whereNotNull('parent_id');
        })->get();
    }

    private function katalogs(Request $request)
    {
        return KatalogDesa::when($request->query('search_katalog'), function ($query, $search) {
            return $query->where('Judul', 'like', "%{$search}%");
        })->when($request->query('filter_kat_katalog'), function ($query, $filter) {
            return $query->where('kategori_id', $filter);
        })->get();
    }

    private function users(Request $request)
    {
        return User::whereIn('role', ['super_admin', 'admin', 'customer'])
            ->when($request->query('search_user'), function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
            })->get();
    }

    private function testimonials(Request $request)
    {
        return Testimoni::when($request->query('search_testimoni'), function ($query, $search) {
            return $query->where('nama', 'like', "%{$search}%")
                ->orWhere('isi_testimoni', 'like', "%{$search}%");
        })->get();
    }

    private function orders(Request $request)
    {
        return Order::with('orderDetails.produk')
            ->when($request->query('search_order'), function ($query, $search) {
                return $query->where('nama_pemesan', 'like', "%{$search}%")
                    ->orWhere('no_hp', 'like', "%{$search}%");
            })
            ->latest('created_at')
            ->get();
    }

    private function salesChartData(): array
    {
        $productsWithSales = Produk::withSum([
            'orderDetails as total_terjual' => function ($query) {
                $query->whereHas('order', function ($q) {
                    $q->where('payment_status', 'paid');
                });
            },
        ], 'jumlah')->get();

        return [
            $productsWithSales->pluck('nama')->toArray(),
            $productsWithSales->pluck('total_terjual')
                ->map(fn ($value) => (int) $value)
                ->toArray(),
        ];
    }

    private function chartColors(int $count): array
    {
        $palette = [
            '#004D40',
            '#D4AF37',
            '#0EA5E9',
            '#16A34A',
            '#EF4444',
            '#8B5CF6',
            '#F97316',
            '#14B8A6',
            '#DB2777',
            '#64748B',
        ];

        $colors = [];

        for ($index = 0; $index < $count; $index++) {
            $colors[] = $palette[$index % count($palette)];
        }

        return $colors;
    }

    private function dashboardStats(): array
    {
        $orderStatusCounts = Order::selectRaw('status_order, COUNT(*) as total')
            ->groupBy('status_order')
            ->pluck('total', 'status_order');

        $paymentReadyQuery = $this->paymentReadyQuery();

        $shipmentMissingCount = Order::whereIn('status_order', ['diproses'])
            ->where($paymentReadyQuery)
            ->where(function ($query) {
                $query->whereNull('nomor_resi')
                    ->orWhere('nomor_resi', '');
            })
            ->count();

        return [
            'total_produk' => Produk::count(),
            'total_katalog' => KatalogDesa::count(),
            'total_agro' => Agroeduwisata::count(),
            'total_users' => User::whereIn('role', ['super_admin', 'admin', 'customer'])->count(),
            'total_orders' => Order::count(),
            'total_omzet' => (float) Order::where('payment_status', 'paid')->sum('total'),
            'month_omzet' => (float) Order::where('payment_status', 'paid')
                ->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])
                ->sum('total'),
            'today_omzet' => (float) Order::where('payment_status', 'paid')
                ->whereDate('created_at', today())
                ->sum('total'),
            'ready_to_process_count' => Order::where('status_order', 'pending')
                ->where($paymentReadyQuery)
                ->count(),
            'shipment_missing_count' => $shipmentMissingCount,
            'low_stock_count' => Produk::where('stok', '<=', 5)->count(),
            'empty_stock_count' => Produk::where('stok', '<=', 0)->count(),
            'status_counts' => collect(['pending', 'diproses', 'dikirim', 'selesai', 'dibatalkan'])
                ->mapWithKeys(fn ($status) => [$status => (int) ($orderStatusCounts[$status] ?? 0)]),
            'latest_orders' => Order::latest('created_at')->take(5)->get(),
            'low_stock_products' => Produk::where('stok', '<=', 5)
                ->orderBy('stok')
                ->orderBy('nama')
                ->take(5)
                ->get(),
        ];
    }

    private function paymentReadyQuery(): \Closure
    {
        return function ($query) {
            $query->where('payment_status', 'paid')
                ->orWhere(function ($offlineQuery) {
                    $offlineQuery
                        ->whereNull('midtrans_order_id')
                        ->whereIn('metode_penerimaan', Order::METODE_OFFLINE);
                });
        };
    }
}
