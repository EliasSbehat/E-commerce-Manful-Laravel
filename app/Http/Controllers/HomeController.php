<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{
    public function featuredSection()
    {
        $products = Product::all()->take(3);
        return view('home', compact('products'));
    }

    public function listProducts()
    {
        $products = Product::all();
        return view('shop' , compact('products'));
    }

    public function productDetails($id){
        $product  = Product::findOrFail($id);
        return view('detail' ,compact('product') );
    }
}
