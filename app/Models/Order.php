<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Store;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\OrderAddress;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'payment_method', 'status', 'store_id','payment_status','subtotal','number'
    ];
//public function?

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault(['name' => 'guest']);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items', 'order_id', 'product_id', 'id', 'id')
            ->using(OrderItem::class) //extends pivot
            ->withPivot([
                'product_name', 'amount_cents', 'quantity', 'options'
            ]);
    }
    public function items()
    {
        return $this->hasMany(OrderItem::class,'order_id');
    }
    
    public function addresses()
    {
        return $this->hasMany(OrderAddress::class);
    }

    // // public static function booted()
    // // {
    // //     static::creating(function (Order $order) {
    // //         $order->number = Order::getNextOrderNumber();
    // //     });
    // // }
    // public static function getNextOrderNumber()
    // {
    //     // $year = Carbon::now()->year;
    //     // $number = Order::whereYear('created_at', $year)->max('number');
    //     // if ($number) {
    //     //     return $number + 1;
    //     // }
    //     // return $year . '0001';
    // }
}
