<?php

namespace App\Http\Controllers\Payment;

use App\Models\Order;
use App\Events\OrderCreated;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Delivery;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class PaymentsController extends Controller
{
    public $order;
    public $items = [];
    public $address = [];
    public $amount;
    public $number;
    public function credit($number)
    {
        $this->number = $number;
        $this->order = Order::where('number', $number)->get();
        $this->address = $this->order[0]->addresses[0]->toArray();

        foreach ($this->order as $order) {
            $this->items[] = $order->items->toArray()[0];
        }
        $token = $this->getToken();
        $order = $this->createOrder($token);
        $paymentToken = $this->getPaymentToken($order, $token)->token;
        return Redirect::away('https://accept.paymob.com/api/acceptance/iframes/' . env('PAYMOB_IFRAME_ID') . '?payment_token=' . $paymentToken);
    }

    public function getToken()
    {
        $response = Http::post('https://accept.paymob.com/api/auth/tokens', [
            'api_key' => env('PAYMOB_API_KEY')
        ]);
        return $response->object()->token;
    }
    public function createOrder($token)
    {

        $total = $this->order->sum('subtotal');
        $data = [
            "auth_token" => $token,
            "delivery_needed" => "false",
            "amount_cents" => $total,
            "currency" => "EGP",
            "items" => [],
        ];
        $response = Http::post('https://accept.paymob.com/api/ecommerce/orders', $data);
        return $response->object();
    }

    public function getPaymentToken($order, $token)
    {
        $total = $this->order->sum('subtotal');
        $billingData = [
            "auth_token" => "$token",
            "amount_cents" => $total,
            "expiration" => 3600,
            "order_id" => $order->id,
            "billing_data" => $this->address,
            "currency" => "EGP",
            "integration_id" => 4069852,
            "lock_order_when_paid" => "false"
        ];
        event(new OrderCreated($this->number)); 
      
        Delivery::create([
            'order_id'=>$this->order[0]->id
        ]);
        $response = Http::post('https://accept.paymob.com/api/acceptance/payment_keys', $billingData);
        return $response->object();
    }
    public function callback(Request $request)
    {
        $data = $request->all();
        ksort($data);
        $hmac = $data['hmac'];
        $array = [
            'amount_cents',
            'created_at',
            'currency',
            'error_occured',
            'has_parent_transaction',
            'id',
            'integration_id',
            'is_3d_secure',
            'is_auth',
            'is_capture',
            'is_refunded',
            'is_standalone_payment',
            'is_voided',
            'order',
            'owner',
            'pending',
            'source_data_pan',
            'source_data_sub_type',
            'source_data_type',
            'success',
        ];

        $connectedString = '';
        foreach ($data as $key => $ele) {
            if (in_array($key, $array)) {
                $connectedString .= $ele;
            }
        }
        $secret = env('PAYMOB_HMAC');
        $hashed = hash_hmac('sha512', $connectedString, $secret);

        if ($hashed == $hmac) {
            // event(new OrderCreated($this->number)); 
            return redirect()->route('home')
            ->with('order-success', "order is created successfully!");
        }
        return redirect()->back()->with('order-failed', "order is failed!");
    }

}
