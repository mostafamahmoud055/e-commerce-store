<?php

namespace App\Listeners;

use App\Models\Admin;
use App\Events\OrderCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\OrderCreatedNotification;

class SendOrderCreatedNotification
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
    public function handle(OrderCreated $event): void
    {
        $orders = $event->orders->all();
        foreach ($orders as $order) {
            $admin = Admin::where('store_id', $order->store_id)->first();
            //notifiable
            if (!empty($admin->id)) {
                $admin->notify(new OrderCreatedNotification($order));
            }
        }
    }
}
