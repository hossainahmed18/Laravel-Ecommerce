@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('success'))
    <div class="alert alert-success">
    	<p>{{ Session::get('success') }}</p>
    </div>
    

@endif



@if (Session::has('sticky_error'))
  <div class="container mt-1">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="alert alert-danger">
          <p>{{ Session::get('sticky_error') }}</p>
        </div>
      </div>
    </div>
  </div>
@endif