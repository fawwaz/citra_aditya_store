<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div class="container">

    <header class="row">
        @include('includes.header')
    </header>

    <div id="main" class="row">

        @yield('content')

    </div>

    <footer class="row">
    	@include('includes.footer')
    </footer>
	
		<!-- Scripts are placed here -->
	{{ HTML::script('bower_components/jquery/dist/jquery.min.js') }}
	{{ HTML::script('bower_components/bootstrap/dist/js/bootstrap.min.js') }}

</div>
</body>
</html>

