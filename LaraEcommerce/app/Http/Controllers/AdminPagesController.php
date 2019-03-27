<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

use App\ProductImages;

use Image;

class AdminPagesController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function adin()
    {
    	return view('admin.pages.index');
    }
}
