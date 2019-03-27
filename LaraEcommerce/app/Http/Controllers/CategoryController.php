<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
    	# code...
    }

     public function show($id)
    {
    	$category = Category::find($id);
        if (!is_null($category)) {
          return view('pages.categories.show', compact('category'));
        }else {
          session()->flash('errors', 'Sorry !! There is no category by this ID');
          return redirect('/');
        }
    }
}
