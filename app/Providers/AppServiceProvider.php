<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        try {
            $settings = Schema::hasTable('site_settings') ? SiteSetting::allAsArray() : [];
            $footerCategories = Schema::hasTable('categories')
                ? Category::active()->orderBy('sort_order')->get(['name', 'slug'])
                : collect();

            View::share([
                'siteSettings' => $settings,
                'footerCategories' => $footerCategories,
            ]);
        } catch (\Throwable $e) {
            View::share([
                'siteSettings' => [],
                'footerCategories' => collect(),
            ]);
        }
    }
}
