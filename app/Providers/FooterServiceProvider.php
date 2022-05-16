<?php

namespace App\Providers;

use App\Models\Footer;
use App\Models\Portfolio;
use Illuminate\Support\ServiceProvider;

class FooterServiceProvider extends ServiceProvider
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
            $view->with('footer', Footer::first())->with('portfolio', Portfolio::first());
        });
    }
}
