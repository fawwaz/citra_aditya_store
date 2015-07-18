<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head-pages')
    @yield('customcss')
</head>

<body>
    @include('includes.navigation-pages')
    
    @yield('content')

    <!-- jQuery -->
    {{ HTML::script('bower_components/sb-admin/js/jquery.js') }}

    <!-- Bootstrap Core JavaScript -->
    {{ HTML::script('bower_components/sb-admin/js/bootstrap.min.js') }}

</body>

</html>
