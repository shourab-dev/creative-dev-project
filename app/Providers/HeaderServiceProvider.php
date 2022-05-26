<?php

namespace App\Providers;

use App\Models\BlogCategory;
use App\Models\Header;
use Illuminate\Support\ServiceProvider;

class HeaderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.frontendapp', function ($view) {
            $view->with('header', Header::select('id', 'logo', 'phone', 'email')->first());
        });
        view()->composer('layouts.blogapp', function ($view) {
            $view->with('header', Header::select('id', 'logo', 'phone', 'email')->first())->with('categories', BlogCategory::select('id', 'name', 'status')->toBase()->get());
        });
    }
}
