<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Brand;

use File;


class AdminBrandController extends Controller
{
    
     public function manage()
    { 
    	$brands=Brand::orderBy('id','desc')->get();
    	return view('admin.pages.brand.index')->with('brands', $brands);
    
    
    }




     public function create()
    {
         
    	return view('admin.pages.brand.create');
    
    }




    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required',
             'description' => 'required',
            
            
        ]);


    	$brand = new Brand;

    	$brand->name = $request->name;
    	$brand->description = $request->description;
        
        

        

        if($request->hasFile('image')){
          
            $image=$request->image;
            $picName=time().'.'.$image->getClientOriginalExtension();
            $path="images/brand/";
            $image->move($path,$picName);

        }
        else{
            $picName = null;
        } 


    	$brand->image = $picName;

        $brand->created_at=now();
        $brand->updated_at=now();
    	
    	$brand->save();


    	//single image insert
        /*
    	if ($request->hasFile('product_image')) {
    		$image = $request->file('product_image');
    	}

        */

        //multiple image insert
    	/*if(count($request->product_image)>0){
    		foreach ($request->product_image as $image) {
    			$img= time().'.'.$image->getClientOriginalExtension();

    		    $location = public_path('images/products/'.$img);

    		    Image::make($image)->save($location);

    		    $product_image=new ProductImages;
    		    $product_image->product_id= $product->id;
    		    $product_image->image= $img;
    		    $product_image->save();
    		}
    	}*/

    	return redirect()->route('admin.brand.create');
    }

    



    public function edit($id)
    {
        $brand=Brand::find($id);

        

        return view('admin.pages.brand.edit',compact('brand'));


        
    
    }



    public function update(Request $request,$id){
        
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->description = $request->description;
        

        if($request->hasFile('image')){

           if (File::exists('images/brand/'.$brand->image)) {  //this line is value less..
              File::delete('images/brand/'.$brand->image);
            }
          
            $image=$request->image;
            $picName=time().'.'.$image->getClientOriginalExtension();
            $path="images/brand/";
            $image->move($path,$picName);

        }
        else{
            $picName = $brand->image;
        }

        $brand->image=$picName;

        $brand->save(); 



        return redirect()->route('admin.brands');
    }


    public function delete($id)
    {
        $brand = Brand::find($id);
        if(!is_null($brand)){
            $brand->delete();
        }
        session()->flash('success','Brand has deleted Succcessfully !!');
        return back();
    }




}
