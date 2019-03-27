<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    
	  public function index()
	  {
	      $products = Product::orderBy('id', 'desc')->paginate(2);
	      return view('pages.product.index')->with('products', $products);
	  }
	  
	  public function show($slug)
	  {
	      $product=Product::where('slug',$slug)->first();
	      if(!is_null($product)){
              return view('pages.product.show',compact('product'));
	      }else{
	      	  session()->flash('errors',"Sorry!! There is no product by this url");
	      	  return redirect()->route('products');
	      }
	  }

}
