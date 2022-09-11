<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use App\Models\Product;
class CartController extends Controller
{
    public function cartList(Request $request)
    {
 
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('cart', compact('cartItems'));
    }

    public function addToCart(){
       $id = request()->id;
       $product = Product::find($id);
       $price = intval($product->price);
        \Cart::add([
            'id'=>$product->id,
            'name'=>$product->name,
            'price'=>$price,
            'quantity'=>request()->quantity,
            'attributes'=>array(
                'image'=>$product->image,
            ),
            'associatedModel' => 'Product'
            ]);
            return back();
    }

    public function updateCart(Request $request){
         $cart = \Cart::update(
            $request->id,
            [
                'quantity'=> [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );
        
        session()->flash('success' , 'Cart item is updated succesfully');
        return redirect()->route('cart.list');
    }

    public function removeCartItem(Request $request){
        \Cart::remove($request->id);

        return redirect()->back();
    }

    public function clearCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }
}
