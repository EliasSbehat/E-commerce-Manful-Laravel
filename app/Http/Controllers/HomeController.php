<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class HomeController extends Controller
{
    public function featuredSection()
    {
        $categories = Category::all()->take(2)->sortByDesc('created_at');
        // dd($categories);
        $products = Product::all()->take(6);
        // $products = Product::all()->toJson();
        // dd($products);
        return view('home', compact('products', 'categories'));
    }

    public function listProducts()
    {
        $products = Product::paginate(6);
        $categories = Category::all();
    
        return view('shop', compact('products', 'categories'));
    }
    public function search(Request $request){
        $products = Product::query();
        if($request->input('search')){
            $products = $products->where('name' , 'LIKE' , '%' .$request->search . '%');
        }
        $products = $products->paginate(5);
        return view('search',compact('products'));
    }

    public function filter(Request $request, $id){
     $catid = $request->id;
     $products = Product::where('category_id', $catid)->get();
     $categories = Category::all();
     return view ('shop', compact('products', 'categories'));

    }
    public function singleProduct($slug)
    {
        $product  = Product::where('slug', $slug)->firstOrFail();
        
        return view('detail', compact('product'));
    }
}
