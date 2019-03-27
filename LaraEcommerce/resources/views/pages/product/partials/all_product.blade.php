@foreach($products as $product)
											                <div class="col-md-3">
												              <div class="card">

                                                               @php
                                                                  $i=1;
                                                               @endphp

                                                               @foreach($product->images as $image )
                                                                   @if ($i > 0)
                                                                         <a href="{{ route('product.show',$product->slug) }}">
                                                                    
		                                                                   	<img class="card-img-top feature-img" src="{{asset('images/products/'.$image->image) }}" alt="{{ $product->title }}" >

		                                                                   </a>


                                                                   @endif

                                                                   @php $i--; @endphp 
												                
												                @endforeach
                                                               

												                <div class="card-body">

												                  <h4 class="card-title"> <a href="{{ route('product.show',$product->slug) }}"> {{$product->title}} </a> </h4>

												                  <p class="card-text">Taka - {{$product->price}}</p>


												                  @include('pages.product.partials.cart-button')


												                </div>
												              </div>
											                </div>
@endforeach


<div class="mt-4 pagination">
	 {{ $products->links() }}
</div>