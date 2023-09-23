<?php

namespace App\Models;

use App\Models\Store;
use App\Models\Category;
use App\Models\Wishlist;
use App\Models\Scopes\StoreScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description', 'image', 'category_id', 'store_id',
        'price', 'compare_price', 'status'
    ];

    public static function booted()
    {
        static::addGlobalScope(new StoreScope());
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }


    protected function scopeActive($query)
    {
        $query->where('status', 'active');
    }
    protected function getImageUrlAttribute($query) // accessor
    {
        if (!file_exists(asset('storage/' . $this->image))) {

            return asset('assets/images/products/default-img.png');
        }
    }
    protected function getSalePercentAttribute($query) // accessor
    {
        if (!$this->compare_price) {
            return 0;
        }
        return number_format(100 - (100 * $this->price / $this->compare_price), 1);
    }
}
