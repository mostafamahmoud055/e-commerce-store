<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wishlist extends Model
{
    use HasFactory;
    public $incrementing = false;
        protected $fillable = [
            'cookie_id', 'user_id', 'product_id'
    ];
    protected static function booted()
    {
        static::creating(function(Wishlist $wishlist){
            $wishlist->id = Str::uuid();
        });
        static::creating(function(Wishlist $wishlist){
            $wishlist->cookie_id = Wishlist::getCookieId();
        });
        
        static::addGlobalScope('cookie_id',function($query){
            $query->where('cookie_id', self::getCookieId());
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'first_name'=>'guest',
            'last_name'=>''
        ]);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function getCookieId()
    {
        $cookie_id = Cookie::get('wishlist_id');
        if (!$cookie_id) {
            $cookie_id = Str::uuid();
            Cookie::queue('wishlist_id', $cookie_id, 30 * 24 * 60);
        }
        return $cookie_id;
    }
}