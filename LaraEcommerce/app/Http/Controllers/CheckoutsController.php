<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Payment;
use App\Order;
use App\Cart;
use Auth;

class CheckoutsController extends Controller
{
    public function index()

    {
    	$payments = Payment::orderBy('priority', 'asc')->get();
        return view('pages.checkouts', compact('payments'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
           'name'  => 'required',
           'phone_no'  => 'required',
           'shipping_address'  => 'required',
           'payment_method_id'  => 'required'
         ]);

    	if ($request->payment_method_id != "cash_in") {
              if ($request->transaction_id == NULL|| empty($request->transaction_id) ) {
              	  session()->flash('sticky_error',"Please Give transaction id for complete shopping");
              	  return back();
              }
    	}

    	$order = new Order();

    	$order->payment_id = Payment::where('short_name', $request->payment_method_id)->first()->id;


    	$order->name = $request->name;
	    $order->email = $request->email;
	    $order->phone_no = $request->phone_no;
	    $order->shipping_address = $request->shipping_address;
	    $order->message = $request->message;
	    $order->ip_address = request()->ip();
	    $order->transaction_id = $request->transaction_id;

	    if (Auth::check()) {
            $order->user_id = Auth::user()->id;
        }

        $order->save();


        //aksathe pura cart er payment hoy

        foreach (Cart::totalCarts() as $cart) {
        	$cart->order_id=$order->id;
        	$cart->save();
        }

        session()->flash('success',"Order has been completed successfully!!! Please wait..admin will confirm it rapidly");
        return redirect()->route('index');

    }
}
