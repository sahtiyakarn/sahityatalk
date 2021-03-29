<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SahityaTalk | Studetn Panel</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}">
    @yield('customcss')

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Menu Bar -->
        <nav class="main-header navbar navbar-expand navbar-info navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right Menu -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/student/logout" role="button">
                        Logout
                    </a>
                </li>
            </ul>
        </nav>
        <!-- Menu Bar End -->

        <!-- Left Menu Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link text-center">
                <img src="{{ asset('assets/img/logo_11.png') }}" alt="my logo" class="" style="">

            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        {{-- <img src="{{ asset('adminlte/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image"> --}}
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="/student/checkCourse" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    MCQ Test

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/student/theory_checkCourse" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Thoery Test
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/student/utmarkcheck" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Show Marks

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/student/attendancecheck" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Attendance

                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/student/feecheck" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Fee

                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- sidebar-menu -->
            </div>
            <!-- Left Menu sidebar -->
        </aside>



        <!-- Page Body -->
        <div class="content-wrapper">
            @yield('page-body')

        </div>
        <!-- End Page body -->
        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('adminlte/js/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/js/adminlte.min.js') }}"></script>
    @yield('customjs')
</body>

</html>
