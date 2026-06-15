<?php

namespace App\View\Composers;

use App\View\Presenters\AdminDashboardOverviewPresenter;
use Illuminate\View\View;

class AdminDashboardOverviewComposer
{
    public function compose(View $view): void
    {
        $data = $view->getData();

        $view->with('dashboardOverview', AdminDashboardOverviewPresenter::make(
            $data['dashboardStats'] ?? [],
            (bool) ($data['isSuperAdmin'] ?? false),
            $data['chartData'] ?? [],
        ));
    }
}
