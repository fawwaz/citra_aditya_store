<!DOCTYPE html>
<html lang="en">

<head>

    @include('includes.head-dashboard')
    @yield('customcss')
</head>

<body>

    <div id="wrapper">

        @include('includes.navigation-dashboard')        

        <div id="page-wrapper">

            <div class="container-fluid">
                    
                    @yield('content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    {{ HTML::script('bower_components/sb-admin/js/jquery.js') }}
    <!-- // <script src="js/jquery.js"></script> -->

    <!-- Bootstrap Core JavaScript -->
    {{ HTML::script('bower_components/sb-admin/js/bootstrap.min.js') }}
    <!-- // <script src="js/bootstrap.min.js"></script> -->

    <!-- Morris Charts JavaScript -->
    {{ HTML::script('bower_components/sb-admin/js/plugins/morris/raphael.min.js') }}
    {{ HTML::script('bower_components/sb-admin/js/plugins/morris/morris.min.js') }}
    {{ HTML::script('bower_components/sb-admin/js/plugins/morris/morris-data.js') }}
    
    @yield('customjs')
    <!-- // <script src="js/plugins/morris/raphael.min.js"></script> -->
    <!-- // <script src="js/plugins/morris/morris.min.js"></script> -->
    <!-- // <script src="js/plugins/morris/morris-data.js"></script> -->

</body>

</html>
