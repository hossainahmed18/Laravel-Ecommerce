<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class AdminOrdersController extends Controller
{
    public function index()
    {
        $orders=Order::orderBy('id','desc')->get();
    	return view('admin.pages.order.index')->with('orders',$orders);
        
    }

    public function show($id)
    {
        $order=Order::find($id);
        $order = Order::find($id);
        $order->is_seen_by_admin = 1;
        $order->save();
    	return view('admin.pages.order.show', compact('order'));
        
    }
    
    

    public function completed($id)
    {
        $order=Order::find($id);

        if($order->is_completed){
            $order->is_completed= 0;
        }else{
            $order->is_completed= 1;
        }

        $order->save();
  	    session()->flash('success', 'Order completed status changed ..!');
  	    return back();
        
    }

    public function paid($id)
    {
        $order=Order::find($id);

        if($order->is_paid){
            $order->is_paid= 0;
        }else{
            $order->is_paid= 1;
        }

        $order->save();
  	    session()->flash('success', 'Order completed status changed ..!');
  	    return back();
        
    }
    

    
}
