<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Contact;


class HomeController extends Controller
{
    public function featuredSection()
    {
        $categories = Category::all()->take(4)->sortByDesc('created_at');
        // dd($categories);
        $products = Product::all()->take(6);
        // $products = Product::all()->toJson();
        // dd($products);
        return view('home', compact('products', 'categories'));
    }

    public function listProducts()
    {
        $products = Product::paginate(5);
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
     $category_id = $request->id;
     $products = Product::where('category_id', $category_id)->paginate(6);
     $categories = Category::all();
     return view ('shop', compact('products', 'categories'));

    }
    public function singleProduct($slug)
    {
        $product  = Product::where('slug', $slug)->firstOrFail();
        
        return view('detail', compact('product'));
    }

    public function contactForm(){
        return view('contact');
    }

    public function submitForm(Request $request){
        //Validate incoming request
        $request->validate([
            'name'=>'required|string',
            'email'=> 'required|email',
            'subject'=>'required|string|max:50',
            'message'=>'required|string|max:255',
        ]);

        Contact::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
        ]);

        return redirect('contact')->with('message','Your message has been sent');
        
    }
}
