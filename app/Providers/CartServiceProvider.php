<?php

namespace App\Providers;


use App\Contracts\CartContract;
use App\Services\CartSession;
use App\Services\CartUser;
use App\View\Composers\CartComposer;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider  extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        \View()->composer('layouts.header', CartComposer::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(CartContract::class, function() {
            if (auth()->check()) {
                return new CartUser();
            }
            return new CartSession();
        });
    }
}
