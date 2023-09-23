<?php

namespace App\Repositories\WishList;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class WishListModelRepository implements WishListRepository
{
    protected $items;
    
    public function __construct()
    {
        $this->items = collect([]);
    }

    public function get(): Collection
    {
        if (!$this->items->count()) {
            $this->items = Wishlist::with('product')->get();
        }
        return $this->items;
    }

    public function add(Product $product)
    {

        $item = Wishlist::where('product_id', $product->id)
        ->first();
        if (!$item) {
            $wishList = Wishlist::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
            ]);
            return $this->get()->push($wishList);
        }
    }

    public function delete($id)
    {
        Wishlist::where('id', $id)
            ->delete();
    }

}
