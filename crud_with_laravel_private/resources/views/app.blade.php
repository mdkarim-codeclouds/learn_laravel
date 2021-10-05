
<!DOCTYPE html>
<html>
<head>
    <title>Laravel Custom Login/Signup Example</title>
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Miron Karim">
    <title>Laravel Custom Login - Dashboard</title>
    <link href="{{ url('css/fontawesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">
    <!-- <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet"> -->
    <link href="{{ url('css/custom.min.css') }}" rel="stylesheet">
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        @auth
            @yield('sidebar')
        @endauth
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @auth
                    @yield('header')
                @endauth

                <!-- Begin Page Content -->
                <div class="container-fluid">

                @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            @auth
                @yield('footer')
            @endauth

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('js/jquery.easing.min.js') }}"></script>
    <script src="{{ url('js/custom.min.js') }}"></script>
    <script src="{{ url('js/common.js') }}?v={{ filemtime(public_path('js/common.js')) }}"></script>
</body>
</html>