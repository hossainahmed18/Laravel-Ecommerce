@extends('admin.layout.master')

@section('content')
        <div class="main-panel">
                <div class="content-wrapper">

                	  <div class="card">
                	  	      <div class="card-header">
                	  	      	   Edit Category
                	  	      	
                	  	      </div>
                	  	      <div class="card-body">
                	  	      	        <form action="{{ route('admin.category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                                      
                	  	      	        	{{ csrf_field() }}

                                              @include('admin.partials.messages')
                                              
											  <div class="form-group">
									              <label for="exampleInputEmail1">Title</label>
									              <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $category->name }}" >
								              </div>
								            <div class="form-group">
								              <label for="exampleInputPassword1">Description</label>
								              <textarea name="description" rows="8" cols="80" class="form-control"> {{ $category->description }} </textarea>

								            </div>


								            <div class="form-group">
								              <label for="exampleInputEmail1">Parent Category (optional)</label>
								              <select class="form-control" name="parent_id">

								              	    <option value="{{ $existing_p_id }}">{{ $existing_p_name }}</option>

                                                    @foreach ($main_categories as $categor)
                                                          <option value="{{ $categor->id }}">{{ $categor->name }}
                                                          </option>
                                                    @endforeach
								              	
								              </select>
								            </div>

								            

								            

								            
								            <div class="form-group">
											    <label for="exampleInputEmail1">Image</label>
											    <input type="file" class="form-control" name="image" id="InputEmail1" aria-describedby="emailHelp">
											</div>
								            

								            	


								           

                                            <button type="submit" class="btn btn-primary">Update Category</button>
										</form>
                	  	      	
                	  	      </div>
                	  	
                	  </div>
                  
                 
                    
                <!-- partial -->
              </div>
        </div>
@endsection