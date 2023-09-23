<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\WishList\WishListRepository;
use App\Repositories\WishList\WishListModelRepository;

class WishListServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(WishListRepository::class ,function(){
            return new WishListModelRepository();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
