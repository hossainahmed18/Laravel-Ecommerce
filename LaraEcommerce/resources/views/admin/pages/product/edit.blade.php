@extends('admin.layout.master')

@section('content')
        <div class="main-panel">
                <div class="content-wrapper">

                	  <div class="card">
                	  	      <div class="card-header">
                	  	      	   Edit Product
                	  	      	
                	  	      </div>
                	  	      <div class="card-body">
                	  	      	        <form action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                                      
                	  	      	        	{{ csrf_field() }}

                                              @include('admin.partials.messages')
                                              
											  <div class="form-group">
									              <label for="exampleInputEmail1">Title</label>
									              <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $product->title }}" >
								              </div>
								            <div class="form-group">
								              <label for="exampleInputPassword1">Description</label>
								              <textarea name="description" rows="8" cols="80" class="form-control"> {{ $product->description }} </textarea>

								            </div>
								            <div class="form-group">
								              <label for="exampleInputEmail1">Price</label>
								              <input type="number" class="form-control" name="price" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $product->price }}">
								            </div>
								            <div class="form-group">
								              <label for="exampleInputEmail1">Quantity</label>
								              <input type="number" class="form-control" name="quantity" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $product->quantity }}">
								            </div>


								            <div class="form-group">
									              <label for="exampleInputEmail1">Select Category</label>
									              <select class="form-control" name="category_id">
									                <option value="">Please select a category for the product</option>
									                @foreach (App\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
									                  <option value="{{ $parent->id }}" {{ $parent->id == $product->category->id? 'selected': '' }}>{{ $parent->name }}</option>

										                  @foreach (App\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
										                    <option value="{{ $child->id }}" {{ $child->id == $product->category->id? 'selected': '' }}  > ------> {{ $child->name }}</option>

										                  @endforeach

									                @endforeach
									              </select>
									         </div>


									         <div class="form-group">
									              <label for="exampleInputEmail1">Select Brand</label>
									              <select class="form-control" name="brand_id">
									                <option value="">Please select a brand for the product</option>
									                @foreach (App\Brand::orderBy('name', 'asc')->get() as $brand)
									                  <option value="{{ $brand->id }}" {{ $brand->id == $product->brand->id ? 'selected': '' }} >{{ $brand->name }}</option>
									                @endforeach
									              </select>
									        </div>


								            

								            <div class="row">
								            	<div class="col-md-4">
								            		  <div class="form-group">
											              <label for="exampleInputEmail1">Image</label>
											              <input type="file" class="form-control" name="product_image" id="InputEmail1" aria-describedby="emailHelp">
											          </div>
								            	</div>

								            	


								            </div>

                                            <button type="submit" class="btn btn-primary">Update Product</button>
										</form>
                	  	      	
                	  	      </div>
                	  	
                	  </div>
                  
                 
                    
                <!-- partial -->
              </div>
        </div>
@endsection