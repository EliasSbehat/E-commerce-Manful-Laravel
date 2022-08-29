<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class CartController extends Controller
{
    public function cartList(Request $request)
    {
 
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('cart', compact('cartItems'));
    }

    public function addToCart(Request $request){
        // $userId = Auth::user()->id;
        $cartdata = \Cart::add([
            'id'=>$request->id,
            'name'=>$request->name,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'attributes'=>array(
                'image'=>$request->image,
            ),
            'associatedModel' => 'Product'
            ]);
            // dd($cartdata);
        // session()->flash('success', 'Product is Added to Cart Successfully !');
            // $previous = url()->previous();
            return back();
    }

    public function updateCart(Request $request){
         \Cart::update(
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
