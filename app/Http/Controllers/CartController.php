<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class CartController extends Controller
{
    public function cartList()
    { 
        // Get all items in the cart
        $cartItems = \Cart::getContent();
        return view('cart', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        // Get id of product from incoming request
       $id = $request->id;
        //Find product with matching id
       $product = Product::findOrFail($id);
        // Convert price to integer    
       $price = intval($product->price);
        //Add product to cart   
        \Cart::add([
            'id'=>$product->id,
            'name'=>$product->name,
            'price'=>$price,
            'quantity'=>$request->quantity,
            'attributes'=>array(
                'image'=>$product->image,
            ),
            'associatedModel' => 'Product'
            ]);
            return back()->with('message','Product Added successfully');
    }

    public function updateCart(Request $request)
    {
        // Update quantity of cart
         \Cart::update(
            $request->id,
            [
                'quantity'=> [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );
        
        return redirect('cart')->with('success', 'Cart item is updated succesfully');
    }

    public function removeCartItem(Request $request)
    {
        // Remove single item from cart
        \Cart::remove($request->id);
        return redirect()->back()->with('success' , 'Item is removed from cart');
    }

    public function clearCart()
    {
        // Clear cart
        \Cart::clear();
        return redirect('cart');
    }
}
