<!DOCTYPE html>
<html>
<head>
	<title>
		@yield('title','Laravel Ecommerce')
	</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
   
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

   <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>

    <div class="wrapper">

    	            {{--Navigation Var--}}

		    	    @include('partials.nav')
                    @include('partials.messages')
					<!----End of Nav Bar--->

					<!-----Start of a side bar+content---->

					@yield('content')


	</div>



     @include('partials.footer')


    @include('partials.script')

    @yield('scripts')
    
</body>
</html>