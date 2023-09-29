<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function show(Order $order)
    {
        return view('front.orders.show',[
            'order'=>$order,
        ]);
    }
}
