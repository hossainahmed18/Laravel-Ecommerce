 <div class="list-group">

 	     @foreach (App\Category::orderBy('name','asc')->where('parent_id', NULL)->get() as $parent_category)
 	         <a href="#main-{{ $parent_category->id }}" class="list-group-item list-group-item-action" data-toggle="collapse">
                   <img src="{{ asset('images/category/'.$parent_category->image) }}"  width="50"> {{ $parent_category->name }}
 	         </a>

 	         <div class="collapse" id="main-{{ $parent_category->id }}">

 	         	 <div class="child-rows">
 	         	 	    @foreach (App\Category::orderBy('name','asc')->where('parent_id', $parent_category->id)->get() as $child_category)
 	         	        <a href="{{ route('categories.show',$child_category->id) }}" class="list-group-item list-group-item-action">

                               @if (Route::is('categories.show'))
					              @if ($child->id == $category->id)
					                active
					              @endif
					            @endif

                   				<img src="{{ asset('images/category/'.$child_category->image) }}"  width="50"> {{ $child_category->name }}
 	                    </a>

 	         	@endforeach

 	         	 </div>
 	         	

 	         </div>


 	     	
 	     @endforeach
		
</div>