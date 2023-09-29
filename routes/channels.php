<?php

use App\Models\Order;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.Admin.{id}', function ($admin, $id) {
    return (int) $admin->id === (int) $id;
});
Broadcast::channel('deliveries.{id}', function ($user, $id) {
    $order = Order::findOrFail($id);
    return (int) $user->id === (int) $order->user_id;
});
