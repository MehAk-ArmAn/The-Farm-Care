<?php

namespace App\Providers;
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
    public function boot()
    {
        View::composer('*', function ($view) {
            $cart = session('inquiry_cart', []);

            $count = 0;
            foreach ($cart as $item) {
                $count += $item['quantity']; // total qty
            }

            $view->with('inquiryCount', $count);
        });
    }
}
