<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name', 'parent_id', 'description', 'image', 'status', 'slug'
    ];

    public function products()
    {
        return $this->hasMany(Product::class,'category_id','id');
    }
    public function parent(){
        return $this->belongsTo(Category::class,'parent_id','id')
        ->withDefault([
            'name'=>'---------'
        ]);
    }
    public function child(){
        return $this->hasMany(Category::class,'parent_id','id');
    }
    public function scopeFilter($query, $filters)
    {
        // dd($filters);
        $query->when($filters['name'] ?? false, function ($query, $value) {
            $query->where('categories.name', 'LIKE', "%{$value}%");
        });
        $query->when($filters['status'] ?? false, function ($query, $value) {
            $query->where('categories.status', $value);
        });
    }
}
