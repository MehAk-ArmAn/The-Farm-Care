<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\Category;
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
        // Share categories with all views
        View::share('categories', Category::where('is_active', 1)->orderBy('name')->get());
    }

}
