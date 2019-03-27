<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Cart extends Model
{
    public $fillable = [
    	'user_id',
    	'ip_address',
    	'name',
    	'product_id',
    	'product_quantity',
    	'order_id'
    	
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function order()
    {
    	return $this->belongsTo(Order::class);
    }
    public function product()
    {
    	return $this->belongsTo(Product::class);
    }

    public static function totalItems()
    {

        if (Auth::check()) {
        	$carts = Cart::where('user_id', Auth::id())
                     ->where('order_id', NULL)
                     ->get();
        	
        }else{

        	$carts=Cart::where('ip_address', request()->ip())
                   ->where('order_id', NULL)
                   ->get();

        }

        $total_items=0;

        foreach ($carts as $cart) {
        	$total_items += $cart->product_quantity;
        }

        return $total_items;

    }


     public static function totalCarts()
    {

        if (Auth::check()) {
            $carts = Cart::where('user_id', Auth::id())
                     ->where('order_id', NULL)
                     ->get();
            
        }else{

            $carts=Cart::where('ip_address', request()->ip())
                   ->where('order_id', NULL)
                   ->get();

        }

       

        return $carts;

    }

}
