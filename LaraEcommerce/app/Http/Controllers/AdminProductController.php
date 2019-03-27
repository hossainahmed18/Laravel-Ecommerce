<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\ProductImages;

use File;

use Image;

class AdminProductController extends Controller
{
    


    public function create()
    {
    	return view('admin.pages.product.create');
    
    }

    public function edit($id)
    {
    	$product=Product::find($id);
    	return view('admin.pages.product.edit')->with('product', $product);


        
    
    }
    

    public function manage()
    { 
    	$products=Product::orderBy('id','desc')->get();
    	return view('admin.pages.product.index')->with('products', $products);
    
    
    }




    public function update(Request $request,$id)
    {

         


       
        

    	$product = Product::find($id);
        $proimg= ProductImages::where('product_id',$id)->first();
        //dd($proimg->image);
        
        //product update
    	$product->title = $request->title;
    	$product->description = $request->description;
    	$product->price = $request->price;
    	$product->quantity = $request->quantity;
    	$product->slug = str_slug($request->title);
    	$product->category_id = $request->category_id;
    	$product->brand_id = $request->brand_id;
    	$product->admin_id = 1;

    	$product->save();

        

    	//single image insert
        
    	/*if ($request->hasFile('product_image')) {
    		$image = $request->file('product_image');
    	}
        */

        
        if($request->file('product_image')){
            
           if (File::exists('images/products/'.$proimg->image)) {  //this line is value less..
              File::delete('images/products/'.$proimg->image);
            }
          

           
           


          
                      $image=$request->product_image;

                      $picName=time().'.'.$image->getClientOriginalExtension();
                      $path="images/products/";
                      //$picUrl=$path.$picName;
                      $image->move($path,$picName);

                

            
            


        }

        else{
            $picName = $proimg->image;
        }

        


        //image update database
        $proimg->product_id= $product->id;
        $proimg->image= $picName;
        $proimg->save();
       

    	return redirect()->route('admin.products');
    }





    public function store(Request $request)
    {


        $request->validate([
            'title' => 'required|unique:products',
             'description' => 'required',
             'price' => 'required|numeric',
             'quantity' => 'required|numeric',
             'category_id' => 'required|numeric',
             'brand_id' => 'required|numeric'

            
        ]);


    	$product = new Product;

    	$product->title = $request->title;
    	$product->description = $request->description;
    	$product->price = $request->price;
    	$product->quantity = $request->quantity;
    	$product->slug = str_slug($request->title);
    	$product->category_id = $request->category_id;
    	$product->brand_id = $request->brand_id;
    	$product->admin_id = 1;

    	$product->save();


    	//single image insert
        /*
    	if ($request->hasFile('product_image')) {
    		$image = $request->file('product_image');
    	}

        */

        //multiple image insert
    	if(count($request->product_image)>0){
    		foreach ($request->product_image as $image) {
    			$img= time().'.'.$image->getClientOriginalExtension();

    		    $location = public_path('images/products/'.$img);

    		    Image::make($image)->save($location);

    		    $product_image=new ProductImages;
    		    $product_image->product_id= $product->id;
    		    $product_image->image= $img;
    		    $product_image->save();
    		}
    	}

    	return redirect()->route('admin.product.create');
    }


    public function delete($id)
    {
        $product = Product::find($id);
        if(!is_null($product)){
            $product->delete();
        }
        session()->flash('success','Product has deleted Succcessfully !!');
        return back();
    }

}
