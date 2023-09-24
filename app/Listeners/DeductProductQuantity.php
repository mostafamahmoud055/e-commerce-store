<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Facades\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeductProductQuantity
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): void // if this listener used by other events pass ($event var) only.
    {
        $orders = $event->orders;
        foreach ($orders as $order) {
            foreach ($order->products as $product) {
                Product::where('id', $product->product_id)
                    ->update([
                        'quantity' => DB::raw("quantity - $product->quantity") //  'quantity - 1' is string so use DB::raw()
                    ]);
                $product->decrement('quantity', $product->pivot->quantity);
            }
        }
    }
}
