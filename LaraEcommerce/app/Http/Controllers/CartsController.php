<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;

use Auth;

use Illuminate\Http\Request;

class CartsController extends Controller
{
     public function index()
    { 
    	
    	return view('pages.carts');
    
    
    }

    public function store(Request $request)
    { 

        $request->validate([

        	'product_id'=>'required'

        ]);

/*
         $cart = Cart::Where('user_id', Auth::id())
                     ->orWhere('ip_address',request()->ip())
                     ->where('order_id',NULL)
                     ->where('product_id',$request->product_id)
                     ->first();


                     if(!is_null($cart)){

                     	$cart->increment('product_quantity');

                     }
                     else{

                     	$cart = new Cart();

				    	if(Auth::check()){

				    		$cart->user_id = Auth::id();


				    	}

				    	$cart->ip_address= request()->ip();
				    	$cart->product_id = $request->product_id;
                        $cart->order_id = NULL;
				    	$cart->save();


                     	

                     }
*/


        if (Auth::check()) {
                   $cart = Cart::where('user_id',Auth::id())
                          ->where('order_id',NULL)
                          ->where('product_id',$request->product_id)
                          ->first();

                   if (!is_null($cart)){
                       $cart->increment('product_quantity');
                   }
                   else{

                       $incart = new Cart();
                       $incart->user_id = Auth::id();
                       $incart->product_id = $request->product_id;
                       $incart->order_id = NULL;
                       $incart->ip_address= request()->ip();
                       $incart->save();


                   }
            
        }
        else{

                $ucart = Cart::where('user_id',NULL)
                          ->where('ip_address',request()->ip())
                          ->first();

                if (!is_null($ucart)) {
                    $acart=Cart::where('user_id',NULL)
                          ->where('ip_address',request()->ip())
                          ->where('product_id',$request->product_id)
                          ->first();

                          if(!is_null($acart)){
                             $acart->increment('product_quantity');
                          }
                          else{


                               $inncart = new Cart();
                               $inncart->user_id = NULL;
                               $inncart->product_id = $request->product_id;
                               $inncart->order_id = NULL;
                               $inncart->ip_address= request()->ip();
                               $inncart->save();

                          }
                }else{
                    $innncart = new Cart();
                    $innncart->user_id = NULL;
                    $innncart->product_id = $request->product_id;
                    $innncart->order_id = NULL;
                    $innncart->ip_address= request()->ip();
                    $innncart->save();
                }

        }


    	
    	session()->flash('success', 'Product has s added to Cart !!');
    	return back();

    
    
    }

    public function update(Request $request, $id)
    { 
    	
         $cart = Cart::find($id);
         if (!is_null($cart)) {
             $cart->product_quantity=$request->product_quantity;
             $cart->save();
         }
          else{
            return redirect()->route('index');
        }
        session()->flash('success',"Cart has been updated successfully");
        return back();

    
    }

    public function delete(Request $request, $id)
    {
         $cart = Cart::find($id);
         if (!is_null($cart)) {
             
             $cart->delete();
         }
          else{
            return redirect()->route('index');
        }
        session()->flash('success',"Cart has been deleted successfully");
        return back();
    }
}
