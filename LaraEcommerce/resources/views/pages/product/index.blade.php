@extends('layout.master')

@section('content')

					<!-----Start of a side bar+content---->

					<div class="container margin-top-20">
						<div class="row">

							  <div class="col-md-4">
							  	    @include('partials.product_sidebar')

							  </div>

							    <div class="col-md-8">
							  	    <div class="row">
							  	  	        <div class="widget">
									            <h3>All Products</h3>
									            <div class="row">

											           @include('pages.product.partials.all_product')


									            </div>
									        </div>


									        <div class="widget">

									        </div>


									</div>

							  	</div>	
							</div>
						</div>
					</div>


	</div>


@endsection	
