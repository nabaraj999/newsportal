<?php

namespace App\Providers;

use App\Models\Company;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer([
            'layouts.app',
            'components.admin-sidebar',
            'layouts.guest',
            'components.frontend-layout',
            'welcome',
        ], function ($view) {
            $company = Company::first(['id', 'name', 'logo']);

            $view->with('adminCompany', $company);
            $view->with('siteCompany', $company);
        });
    }
}
