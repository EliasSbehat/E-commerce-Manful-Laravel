<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class HomeController extends Controller
{
    public function featuredSection()
    {
        $categories = Category::all()->sortByDesc('created_at');
        // dd($categories);
        $products = Product::all()->take(6);
        // $products = Product::all()->toJson();
        // dd($products);
        return view('home', compact('products', 'categories'));
    }

    public function listProducts()
    {
        $products = Product::paginate(5);

        return view('shop', compact('products'));
    }

    public function singleProduct($slug)
    {
        $product  = Product::where('slug', $slug)->firstOrFail();
        return view('detail', compact('product'));
    }
}
