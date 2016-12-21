<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
    	<meta name="author" content="">

        <title>SmartStore @yield('title')</title>
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">
        
         @yield('stylesheets')
       
    </head>

    <body>
    	@include('partials.nav')

    	<!-- Boody for posts -->
		<div class="container posts">
			@include('partials.alert')	
			
			@yield('content')
	    </div>

	    @include('partials.footer')
	    
	    <script src="{{asset('js/jquery-3.1.0.min.js') }}"></script>
		<script src="{{asset('js/bootstrap.min.js') }}"></script>
		@yield('scripts')
    </body>
</html>