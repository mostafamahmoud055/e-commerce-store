<?php

namespace App\Http\Controllers\Front;

use App\Facades\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Events\OrderCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Intl\Countries;
use App\Repositories\Cart\CartRepository;

class CheckoutController extends Controller
{
    public function create(CartRepository $cart)
    {
        if ($cart->get()->count() == 0) {
            return redirect()->route('home');
        }
        return view('front.checkout', [
            'cart' => $cart,
            'countries' => Countries::getNames(),
        ]);
    }
    public function store(Request $request, CartRepository $cart)
    {
        $request->validate([
            'address.street' => ['required', 'string', 'max: 255'],
            'address.apartment' => ['required'],
            'address.floor' => ['required', "integer"],
            'address.building' => ['required'],
        ]);

        $items = $cart->get()->groupBy('product.store_id')->all();
        DB::beginTransaction();
        try {
            $year = Carbon::now()->year;
            $number = Order::whereYear('created_at', $year)->max('number');
            if ($number) {
                $number = $number + 1;
            } else {

                $number = $year . '0001';
            }
            $price = 0;
            foreach ($items as $store_id => $cart_items) {
                foreach ($cart_items as $item) {
                    $price = ++$item->product->price * $item->quantity;
                }
                $order = Order::create([
                    'store_id' => $store_id,
                    'user_id' => Auth::id(),
                    'payment_method' => 'cod',
                    'number' => $number,
                    'subtotal' => round($price)
                ]);

                foreach ($cart_items as $item) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $item->product_id,
                        'product_name' => $item->product->name,
                        'amount_cents' => $item->product->price,
                        'quantity' => $item->quantity,
                    ]);
                }

                $order->addresses()->create($request->post('address'));
            }
            Db::commit();
            // event('order.created', $order, Auth::user());
            // OR
            // event(new OrderCreated($this->number)); 
            // event in paymentController
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        return redirect()->route('orders.payments.credit', $number);
    }
}
