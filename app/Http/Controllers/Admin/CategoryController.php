<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use Illuminate\Http\Request;
use App\Models\Category;
Use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function index()
    {
        // Fetch all categories
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));   
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryStoreRequest $request)
    {
        // Type hinting the request class that contains the validation rules
        // Store the file in the public/categories directory
        $image = $request->file('image')->store('public/categories');
        // Store the category into the database
        Category::create([
            'name'=> $request->name,
            'image'=>$image
        ]);

        return to_route('admin.categories.index')->with('message','Created Successfully');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
         // Validate the incoming request
        $request->validate([
            'name'=>'required',
        ]);
        // Get the image
        $image = $category->image;
         // Check if the incoming request has a file image then delete if from storage and replace it with  new image  
        if($request->hasFile('image')){
            Storage::delete($category->image);
            $image = $request->file('image')->store('public/categories');
        }
        // Update the corresponding records in the database
        $category->update([
            'name'=>$request->name,
            'image'=>$image
        ]);

        return to_route('admin.categories.index')->with('message','Updated Successfully');
    }

    public function destroy(Category $category)
    {
        // Delete image from storage and category from the database
        Storage::delete($category->image);
        $category->delete();
        return to_route('admin.categories.index')->with('message', 'Deleted Successfully');
    }
}
