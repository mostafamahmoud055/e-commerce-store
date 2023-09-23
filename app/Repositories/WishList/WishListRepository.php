<?php

namespace App\Repositories\WishList;

use App\Models\Product;
use Illuminate\Support\Collection;

interface WishListRepository
{
    public function get(): Collection;
    public function add(Product $product);
    public function delete($id);
}
