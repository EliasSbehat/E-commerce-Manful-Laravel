<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
     public function index(){
        $cartItems = \Cart::getContent();
        return view('checkout' , compact('cartItems'));
    }
    public function store(Request $request){
        // Validate the incoming request
        $validate = $request->validate([
            'firstname'=>'required|max:50',
            'lastname'=>'required|max:50',
            'phone'=>'required|numeric',
            'city'=>'required|max:100',
            'address'=>'required|max:100',
        ]);
        //  Save customer into database
        Customer::create([
            'user_id'=>auth()->user()->id,
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'phone'=>$request->phone,
            'city'=>$request->city,
            'address'=>$request->address,
        ]);

        //Save order into database
        

        return redirect('confirmation');
     

    }
}
