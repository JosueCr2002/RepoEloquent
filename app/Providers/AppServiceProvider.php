<?php

namespace App\Providers;

use App\Http\Interfaces\Iproducts;
use App\Http\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;



class AppServiceProvider extends ServiceProvider

{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(Iproducts::class,ProductRepository::class);
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
