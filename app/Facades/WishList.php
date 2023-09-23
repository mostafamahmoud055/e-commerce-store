<?php

namespace App\Facades;

use App\Repositories\WishList\WishListRepository;
use Illuminate\Support\Facades\Facade;

class WishList extends Facade
{
    public static function getFacadeAccessor()
    {
        return WishListRepository::class;
    }
}