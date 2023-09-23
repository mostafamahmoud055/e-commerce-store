<?php

namespace App\Repositories\Cart;

use App\Models\Product;
use Illuminate\Support\Collection;

interface CartRepository
{
    public function get(): Collection;
    public function add(Product $product, $quantity);
    public function update($id, $quantity);
    public function delete($id);
    public function empty();
    public function total();
}
