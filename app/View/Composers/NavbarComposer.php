<?php

namespace App\View\Composers;

use App\View\Presenters\CustomerOrderPresenter;
use App\View\Presenters\CustomerProfilePresenter;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NavbarComposer
{
    public function compose(View $view): void
    {
        $navbarCustomer = Auth::check() && Auth::user()->role === 'customer'
            ? Auth::user()
            : null;

        $navbarOrders = collect();
        $navbarPreviewOrders = collect();
        $navbarOrderCount = 0;
        $navbarCustomerPhotoUrl = null;
        $navbarOrderIds = [];

        if ($navbarCustomer) {
            $latestOrders = $navbarCustomer->orders()
                ->with('orderDetails.produk')
                ->latest('created_at')
                ->take(5)
                ->get();
            $navbarOrders = CustomerOrderPresenter::collection($latestOrders, 2);
            $navbarPreviewOrders = $navbarOrders->take(3);

            $navbarOrderCount = $navbarCustomer->orders()->count();
            $navbarCustomerPhotoUrl = CustomerProfilePresenter::photoUrl($navbarCustomer);
            $navbarOrderIds = $latestOrders->pluck('id')->values()->all();
        }

        $view->with(compact(
            'navbarCustomer',
            'navbarOrders',
            'navbarPreviewOrders',
            'navbarOrderCount',
            'navbarCustomerPhotoUrl',
            'navbarOrderIds'
        ));
    }
}
