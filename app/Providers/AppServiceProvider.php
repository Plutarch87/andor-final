<?php

namespace App\Providers;

use App\Category;
use App\Order;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.app', function($view)
        {
            $view->with('categories', Category::all());
        });
        view()->composer('narudzbine_statistika', function($view)
        {
            $view->with('orders', Order::all());
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
