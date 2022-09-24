<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
class OrderController extends Controller
{
    public function index()
    {
        // Get all orders by descending order
        $orders = Order::orderByDesc('created_at')->paginate(10);
        // Get all orders that are pending or unpaid but not cancelled
        $pendingOrders = Order::where('status','pending')->orwhere('payment_status', 'unpaid')->whereNot('status','cancelled')->orderByDesc('created_at')->paginate(10);
        return view('admin.orders.index', compact('orders', 'pendingOrders'));
    }

    public function search(Request $request)
    {
        // Order query
        $orders = Order::query();
        // Find the order where the order no exactly matches the incoming request
        if($request->input('search')){
            $orders = $orders->where('order_no' ,'LIKE' ,$request->search);
        }
        $orders = $orders->get();
        return view('admin.orders.search', compact('orders'));
    }

    public function show($id)
    {
        // Show a single order
        $singleOrder = Order::findOrFail($id);
        return view('admin.orders.details', compact('singleOrder'));
    }

    public function edit(Order $order)
    {
        return view('admin.orders.edit' , compact('order'));
    }

    
    public function update(Request $request, Order $order)
    {
        // Validate the incoming request
        $request->validate([
            'status'=>'required',
        ]);
        // Update the payment status and order status
        $order->status = $request->status;
        $order->payment_status = $request->payment_status;
        $order->save();
        return to_route('admin.orders.index')->with('success','Order Updated successfully');
    }
}
