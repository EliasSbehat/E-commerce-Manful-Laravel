<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function index()
    {
        //Query orders
        $orders = Order::query();
        //Get all orders  except cancelled
        $totalOrders = $orders->whereNot('status', 'cancelled')->get();
        $totalOrdersCount = $totalOrders->count();
        // Calculate percentage of completed orders 
        $numOfCompletedOrders = $orders->where('status' , 'completed')->count();
        if($numOfCompletedOrders>0){
            $percentageCompletedOrders = ($numOfCompletedOrders/ $totalOrdersCount)*100;
        }else{
            $percentageCompletedOrders = 0;
        }
        //Calculate percentage of orders with pending payment
        $numOfPendingPayment = $totalOrders->where('payment_status', 'unpaid')->count();
        if($totalOrdersCount>0){
            $percentagePendingPayment = ($numOfPendingPayment/ $totalOrdersCount)*100;
        }else{
            $percentagePendingPayment = 0;
        }
        
        // Get all pending orders in the last 24 hours 
        $pendingOrders = Order::where('status', 'pending')->where('created_at', '>=', now()->subDay())->get();
        //Get sales from completed orders in the last 30 days
        $ordersFrom30days = Order::where('status', 'completed')->where('created_at', '>', now()->subDays(30)->endOfDay())->get();
        $sales =   $ordersFrom30days;
        $totalSales=0;
        foreach ($sales as  $sale) {
            $loopSale = $sale->total;
            $totalSales = $totalSales + $loopSale;
        }
        
        //Get total number of products sold from orders completed in last 30 days
        $completedOrders = $ordersFrom30days;
         $productsSold = 0;
        foreach($completedOrders as $completedOrder){
            $productsSold = $productsSold + $completedOrder->orderDetails->count();
        }
        
        //Get unread messages from contacts table
        $messages = Contact::where('read', false)->get();
        
        //Get Total Products and Categories
        $products = Product::all();
        $totalProducts = $products->count();
        $categories = Category::all();
        $totalCategories = $categories->count();

        //Get all users and deactivated users
        $users = User::all();
        $totalUsers = $users->count();
        $deactivatedUsers = DB::table("users")->whereNotNull('deleted_at')->get()->count();

        return view('admin.index', compact('pendingOrders', 'totalSales','productsSold' , 'messages', 'percentageCompletedOrders','percentagePendingPayment','totalOrdersCount' , 'totalProducts','totalCategories','totalUsers', 'deactivatedUsers'));
    }

    public function markAsRead(Request $request)
    {
        // Get the id from the request
        $id = $request->id;
        // Fetch record with the id
        $contact = Contact::whereId($id)->first();
        // Set the boolean value in read column to true(1)
        $contact->read = 1;
        // Update the record
        $contact->save();
        return back()->with('message', 'Mark as read');
    }
}
