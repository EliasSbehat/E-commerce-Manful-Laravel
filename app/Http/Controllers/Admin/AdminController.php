<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
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
        
        return view('admin.index', compact('pendingOrders', 'totalSales','productsSold' , 'messages'));
    }

    public function markAsRead(Request $request){
        $id = $request->id;
        $contact = Contact::whereId($id)->first();
        $contact->read = 1;
        $contact->save();
        return back()->with('message', 'Mark as read');
    }
}
