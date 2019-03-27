<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use File;
class AdminCategoryController extends Controller
{
    public function manage()
    { 
    	$categories=Category::orderBy('id','desc')->get();
    	return view('admin.pages.category.index')->with('categories', $categories);
    
    
    }




     public function create()
    {
         $main_categories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
    	return view('admin.pages.category.create',compact('main_categories'));
    
    }




    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required',
             'description' => 'required',
            
            
        ]);


    	$category = new Category;

    	$category->name = $request->name;
    	$category->description = $request->description;
        
        if(isset($request->parent_id)){
            $category->parent_id=$request->parent_id;
        }
        else{
            $category->parent_id=1000;
        }

        

        if($request->hasFile('image')){
          
            $image=$request->image;
            $picName=time().'.'.$image->getClientOriginalExtension();
            $path="images/category/";
            $image->move($path,$picName);

        }
        else{
            $picName = null;
        } 


    	$category->image = $picName;

        $category->created_at=now();
        $category->updated_at=now();
    	
    	$category->save();


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

    	return redirect()->route('admin.category.create');
    }

    



    public function edit($id)
    {
        $category=Category::find($id);

        $main_categories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();

        $existing_parent= Category::where('id',$category->parent_id)->first();

        if(!is_null($existing_parent)){
            $existing_p_id=$existing_parent->id;
            $existing_p_name=$existing_parent->name;

        }
        else{
            $existing_p_id=null;
            $existing_p_name="Nai";
        }

        return view('admin.pages.category.edit',compact('category','main_categories','existing_p_id','existing_p_name'));


        
    
    }



    /*public function update(Request $request,$id){
        
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;

        if($request->hasFile('image')){

            if(file_exists('images/category/'.$category->image)){
                
                unlink('images/category/'.$category->image);
                
           }

          
            $image=$request->image;
            $picName=time().'.'.$image->getClientOriginalExtension();
            $path="images/category/";
            $image->move($path,$picName);

        }
        else{
            $picName = $category->image;
        }

        $category->image=$picName;

        $category->save(); 



        return redirect()->route('admin.categories');
    }

    */


    public function update(Request $request,$id){
        
        
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        
        
        

        if($request->hasFile('image')){

            if (File::exists('images/category/'.$category->image)) {  //this line is value less..
              File::delete('images/category/'.$category->image);
            }
            $image=$request->image;
            $picName=time().'.'.$image->getClientOriginalExtension();
            $path="images/category/";
            $image->move($path,$picName);

          
           
        }
        else{
            $picName = $category->image;
        }

        $category->image=$picName;

        $category->save(); 



        return redirect()->route('admin.categories');  

        
        
      


        
    }









    public function delete($id)
    {
        $category = Category::find($id);
        if(!is_null($category)){
            $category->delete();
        }
        session()->flash('success','Category has deleted Succcessfully !!');
        return back();
    }








}
