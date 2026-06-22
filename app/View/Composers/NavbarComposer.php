<?php

namespace App\View\Composers;

use App\Models\User;
use App\View\Presenters\CustomerOrderPresenter;
use App\View\Presenters\CustomerProfilePresenter;
use App\View\Presenters\NavbarPresenter;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NavbarComposer
{
    public function compose(View $view): void
    {
        $authUser = Auth::user();
        $navbarCustomer = $authUser instanceof User && ($authUser->role ?? null) === 'customer'
            ? $authUser
            : null;

        $navbar = NavbarPresenter::make(request(), $navbarCustomer, $authUser);
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
            'navbar',
            'navbarCustomer',
            'navbarOrders',
            'navbarPreviewOrders',
            'navbarOrderCount',
            'navbarCustomerPhotoUrl',
            'navbarOrderIds'
        ));
    }
}
