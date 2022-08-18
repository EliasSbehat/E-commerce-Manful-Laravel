<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class HomeController extends Controller
{
    public function featuredSection()
    {
        $categories = Category::all()->take(2);
        $products = Product::all()->take(6);
        return view('home', compact('products' , 'categories'));
    }

    public function listProducts()
    {
        $products = Product::all();
        return view('shop' , compact('products'));
    }

    public function singleProduct($slug){
        $product  = Product::where('slug' , $slug)->firstOrFail();
        return view('detail' ,compact('product') );
    }
}
