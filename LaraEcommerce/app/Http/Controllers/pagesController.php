<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product; 



class pagesController extends Controller
{
    public function product()
    {  
    	//$products=Product::orderBy('id','desc')->get();
        $products=Product::orderBy('id','desc')->paginate(2);
        return view('pages.product.index')->with('products', $products);
    }


    public function adin()
    {  
    	
        return view('admin.pages.index');
    }


    public function search(Request $request)
    {  
        //$products=Product::orderBy('id','desc')->get();
        $search=$request->search;
        $products=Product::orWhere('title','like', '%'.$search.'%')
        ->orWhere('description','like', '%'.$search.'%')
        ->orWhere('price','like', '%'.$search.'%')
        ->orWhere('quantity','like', '%'.$search.'%')
        ->orWhere('slug','like', '%'.$search.'%')
        ->paginate(4);
        return view('pages.product.search',compact('search','products'));
    }

}
