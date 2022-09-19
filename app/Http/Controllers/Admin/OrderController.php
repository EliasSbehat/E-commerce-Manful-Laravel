<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderByDesc('created_at')->paginate(10);
        $pendingOrders = Order::where('status','pending')->orwhere('payment_status', 'unpaid')->whereNot('status','cancelled')->orderByDesc('created_at')->paginate(10);
        return view('admin.orders.index', compact('orders', 'pendingOrders'));
    }

    
    
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        $singleOrder = Order::findOrFail($id);
        return view('admin.orders.details', compact('singleOrder'));
    }

   
    public function edit(Order $order)
    {
        return view('admin.orders.edit' , compact('order'));
    }

    
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status'=>'required',
        ]);
        
        $order->status = $request->status;
        $order->payment_status = $request->payment_status;
        $order->save();
        
        return to_route('admin.orders.index')->with('success','Order Updated successfully');
    }

    
    public function destroy($id)
    {
        
    }
}
