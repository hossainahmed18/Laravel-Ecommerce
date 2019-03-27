@extends('admin.layout.master')

@section('content')
        <div class="main-panel">
                <div class="content-wrapper">

                	  <div class="card">
                	  	      <div class="card-header">
                	  	      	   Add Category
                	  	      	
                	  	      </div>
                	  	      <div class="card-body">
                	  	      	        <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                                      
                	  	      	        	{{ csrf_field() }}

                                              @include('admin.partials.messages')
                                              
											  <div class="form-group">
									              <label for="exampleInputEmail1">Title</label>
									              <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" >
								              </div>
								            <div class="form-group">
								              <label for="exampleInputPassword1">Description</label>
								              <textarea name="description" rows="8" cols="80" class="form-control"></textarea>

								            </div>

								            <div class="form-group">
								              <label for="exampleInputEmail1">Parent Category (optional)</label>
								              <select class="form-control" name="parent_id">

								              	    <option value="">Please select a Parent category</option>
                                                    @foreach ($main_categories as $category)
                                                          <option value="{{ $category->id }}">{{ $category->name }}
                                                          </option>
                                                    @endforeach
								              	
								              </select>
								            </div>

								           
								            

								            
								            <div class="form-group">
											    <label for="exampleInputEmail1">Image</label>
											    <input type="file" class="form-control" name="image" id="exampleInputEmail1" aria-describedby="emailHelp">
											</div>
								            	

								            	
								            	

                                            <button type="submit" class="btn btn-primary">Add Category</button>
										</form>
                	  	      	
                	  	      </div>
                	  	
                	  </div>
                  
                 
                    
                <!-- partial -->
              </div>
        </div>
@endsection