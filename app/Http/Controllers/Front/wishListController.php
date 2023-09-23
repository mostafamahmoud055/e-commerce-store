<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\WishList\WishListRepository;

class wishListController extends Controller
{

    protected $wishList;
    public function __construct(WishListRepository $wishList)
    {
        $this->wishList = $wishList;
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'int', 'exists:products,id'],
        ]);

        $product = Product::findOrFail($request->post('product_id'));
        $this->wishList->add($product);
        return redirect()->back()->with('success', 'Product added to wish list!');
    }

    public function destroy($id)
    {
        $this->wishList->delete($id);

        return redirect()->back()->with([
            'success' => 'Item deleted',
        ]);
    }
}
