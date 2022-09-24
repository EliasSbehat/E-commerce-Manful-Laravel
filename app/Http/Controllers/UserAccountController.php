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

    public function editProfile($id)
    {
        return view('editprofile');
    }

    public function editPassword($id)
    {
        return view('editpassword');
    }

    public function updateProfile(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'name'=>'required|min:4|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::user()->id . ',id' 
        ]);
        // If validation passes update user
         User::whereId(auth()->user()->id)->update([
            'name'=> $request->name,
            'email'=> $request->email,
            'password' =>auth()->user()->password,
        ]);

        return to_route('account')->with('success','Profile Updated Successfully');
    }

    public function updatePassword(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'old_password'=> 'required',
            'new_password'=>'required|confirmed'
        ]);
        // Unhash the password and check if  password request matches with the current password 
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", 'Input correct current password!');
        }
        // If the check if successfull hash and update user password
        User::whereId(auth()->user()->id)->update([
            'password'=>Hash::make($request->new_password),
        ]);

        return to_route('account')->with('success','Password updated successfully');
    }

    public function orders()
    {
        // Get current logged in user id
        $user_id = auth()->user()->id;
        // Fetch orders for individual user by joining customers and orders table by the customer_id
        $orders = DB::table('customers')->join('orders' , 'customers.id', '=' , 'orders.customer_id')->where('user_id', $user_id)->latest('orders.created_at')->paginate(5);
        return view('orders' , compact('orders'));
    }

    public function singleOrder($order_no)
    {
        // Fetch a single order by the order no
        $singleOrder = Order::where('order_no', $order_no)->firstOrFail();
        return view('singleorder', compact('singleOrder'));
    }

    public function cancelOrder(Request $request)
    {
        // Get id of single order
        $id = $request->singleorderid;
        // Retrieve the single order
        $currentOrderItem = Order::findOrFail($id);
        // Set the status to cancelled
        $currentOrderItem->status = 'cancelled';
        $currentOrderItem->save();
        return back()->with('message','Order cancelled successfully');
    }

}
