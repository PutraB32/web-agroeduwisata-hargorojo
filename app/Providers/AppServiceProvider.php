<?php

namespace App\Providers;

use App\View\Composers\AdminDashboardOverviewComposer;
use App\View\Composers\NavbarComposer;
use Carbon\Carbon;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Observers\OrderObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (!file_exists(public_path('storage'))) {
            try {
                \Illuminate\Support\Facades\Artisan::call('storage:link');
            } catch (\Exception $e) {
                // Ignore if it fails
            }
        }

        Carbon::setLocale('id');

        $appUrl = config('app.url');

        if (is_string($appUrl) && str_starts_with($appUrl, 'http')) {
            URL::forceRootUrl($appUrl);

            if (str_starts_with($appUrl, 'https://')) {
                URL::forceScheme('https');
            }
        }

        \Illuminate\Pagination\Paginator::useTailwind();

        Order::observe(OrderObserver::class);

        View::composer('Admin.dashboard.overview', AdminDashboardOverviewComposer::class);
        View::composer('layouts.navbar', NavbarComposer::class);

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by(
                Str::lower((string) $request->input('email')).'|'.$request->ip()
            );
        });

        RateLimiter::for('password-reset', function (Request $request) {
            return Limit::perMinutes(5, 3)->by(
                Str::lower((string) $request->input('email')).'|'.$request->ip()
            );
        });

        RateLimiter::for('public-form', function (Request $request) {
            return Limit::perMinute(5)->by($request->ip());
        });

        RateLimiter::for('cart', function (Request $request) {
            return Limit::perMinute(30)->by($request->ip());
        });

        RateLimiter::for('checkout', function (Request $request) {
            $key = $request->user()
                ? 'user:'.$request->user()->id
                : 'ip:'.$request->ip();

            return Limit::perMinute(10)->by($key);
        });
    }
}
