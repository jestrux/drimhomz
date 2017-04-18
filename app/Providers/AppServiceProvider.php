<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{
/**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $base_url = url("/");
        $res_url = asset("images/") . "/";
        $storage_url = asset('images/uploads/') . "/";

        View::share([
            'base_url' => $base_url,
            'res_url' => $res_url,
            'user_url' => $storage_url . "user_dps/",
            'house_url' => $storage_url . "houses/",
            'banner_url' => $storage_url . "banners/",
            'office_url' => $storage_url . "offices/",
            'shop_url' => $storage_url . "shops/",
            'product_url' => $storage_url . "products/",
            'home_url' => $storage_url . "images/", #"homz/",
            'plot_url' => $storage_url . "images/", #"plots/",
            'rental_url' => $storage_url . "images/", #"rentals/",
            'question_url' => $storage_url . "images/", #"rentals/",
            'article_url' => $storage_url . "images/", #"rentals/",
        ]);
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
