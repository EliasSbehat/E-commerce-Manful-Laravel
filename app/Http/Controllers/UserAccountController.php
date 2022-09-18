<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{
    public function account()
    {
        return view('account');
    }

    public function editProfile($id){
        return view('editprofile');
    }

    public function editPassword($id){
        return view('editpassword');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name'=>'required|min:4|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::user()->id . ',id' 
        ]);
         User::whereId(auth()->user()->id)->update([
            'name'=> $request->name,
            'email'=> $request->email,
            'password' =>auth()->user()->password,
        ]);

        return to_route('account')->with('success','Profile Updated Successfully');
    }

    public function updatePassword(Request $request){
        $request->validate([
            'old_password'=> 'required',
            'new_password'=>'required|confirmed'
        ]);

        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", 'Input correct current password!');
        }

        User::whereId(auth()->user()->id)->update([
            'password'=>Hash::make($request->new_password),
        ]);

        return to_route('account')->with('success','Password updated successfully');
    }

    public function orders()
    {
        $user_id = auth()->user()->id;
        $orders = DB::table('customers')->join('orders' , 'customers.id', '=' , 'orders.customer_id')->where('user_id', $user_id)->get();
        return view('orders' , compact('orders'));
    }

}
