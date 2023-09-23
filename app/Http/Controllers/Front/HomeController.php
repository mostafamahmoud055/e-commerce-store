<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(){
        $products = Product::with('category')->active()->latest()->limit(8)->get();
        $lang = Storage::disk('public')->get('ar.json');
        return view('front.home',compact('products','lang'));
    }
}
