<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        // Get all products by descending order and paginate the results by 5
        $products= Product::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.products.index', compact('products'));  
    }


    public function create()
    {
        // Compact all categories into the view
        $categories = Category::all();
        return view('admin.products.create' , compact('categories'));
    }

    public function store(ProductStoreRequest $request)
    {
        // Type hinting the request class that contains the validation rules
        // Store the file in the public/categories directory
        $image = $request->file('image')->store('public/products');
        // Store the product into the database
        Product::create([
            'name' => $request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'category_id'=>$request->category_id,
            'image' => $image,
        ]);

        return to_route('admin.products.index')->with('message', 'Created Successfully');
    }

    public function edit(Product $product)
    { 
         // Compact all categories into the view
        $categories = Category::all();
        return view('admin.products.edit' , compact('product' , 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        // Validate the incoming request
        $request->validate([
            'name'=>'required',
        ]);
        // Get the image
        $image = $product->image;
        // Check if the incoming request has a file image then delete if from storage and replace it with   new image
        if($request->hasFile('image')){
            Storage::delete($product->image);
            $image = $request->file('image')->store('public/products');
        }
        // Update the corresponding records in the database
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $image,
        ]);

        return to_route('admin.products.index')->with('message', 'Updated Successfully');
    }

    public function destroy(Product $product)
    {
        // Delete image from storage and product from the database
        Storage::delete($product->image);
        $product->delete();
        return to_route('admin.products.index')->with('message', 'Deleted Successfully');
    }
}
