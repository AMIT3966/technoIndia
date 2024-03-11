<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;
use App\Models\Product;
use App\Models\SocialMedia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        view::composer('*', function($view) {
            $ip = $_SERVER['REMOTE_ADDR'];
            // cart count
            $settingsTableExists = Schema::hasTable('settings');
            if ($settingsTableExists) {
                $settings = Setting::get();
            }
            // Social Media
            $SocialMediaTableExists = Schema::hasTable('social_media');
            if ($SocialMediaTableExists) {
                $SocialMedia = SocialMedia::get();
            }
            $ProductTableExists = Schema::hasTable('products');
            if ($ProductTableExists) {
                $Products = Product::with('categoryDetails')  
                ->latest()                               
                ->where('status', 1)                     
                ->get()
                ->groupBy('categoryDetails.title');
            }
            view()->share('products_category', $Products);
            view()->share('social_media', $SocialMedia);
            view()->share('settings', $settings);
        });
    }
}
