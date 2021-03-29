<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sahitya Talk | @yield('title')</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}">
    @yield('customcss')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/admission" class="nav-link">Admission</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/fee" class="nav-link">Fee</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/enquiry" class="nav-link">Enquiry</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/messageus" class="nav-link">Message</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('profile.show') }}" class="nav-link">Profiles</a>
                </li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();" class="nav-link">
                            logout
                        </a>
                    </li>
                </form>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/dashboard" class="brand-link text-center">
                <img src="{{ asset('assets/img/logo_11.png') }}" alt="AdminLTE Logo" class="" style="">
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->


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
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Admission
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admission" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>New</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admissionshow" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Show</p>
                                    </a>
                                </li>


                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link bg-danger">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Fee
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/fee" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Fee</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/feeshow" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Show Fee</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link bg-info">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    NIOS
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Fee</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/niosshow" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Show NIOS</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link bg-success">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Course
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admissionid" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>ID</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/feeno" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Fee No</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/completed" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Course Completed</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/missing" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Missing</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/leave" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Leave</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/badtransfer" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Bad Transfer</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/remain" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Remain</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admissionall" target="_blank" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">LABELS</li>
                        <li class="nav-item">
                            <a href="studentid" class="nav-link">
                                <i class="nav-icon far fa-circle text-danger"></i>
                                <p class="text">Student ID</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/studentcover" class="nav-link">
                                <i class="nav-icon far fa-circle text-warning"></i>
                                <p>Cover Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/expenseshow" class="nav-link">
                                <i class="nav-icon far fa-circle text-success"></i>
                                <p>expenses </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/balancesheet" class="nav-link">
                                <i class="nav-icon far fa-circle text-success"></i>
                                <p>Balance Sheet</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/emarksheet" class="nav-link">
                                <i class="nav-icon far fa-circle text-success"></i>
                                <p>Marksheet</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/thoery_test" class="nav-link">
                                <i class="nav-icon far fa-circle text-success"></i>
                                <p>Theory Test</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content">
                @yield('content')
            </div>
        </div>
        <!-- /.content-wrapper -->

        {{-- <footer class="main-footer">
            <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.1.0-rc
            </div>
        </footer> --}}

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('adminlte/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('adminlte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('adminlte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Summernote -->
    <script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('adminlte/dist/js/pages/dashboard.js') }}"></script>

    @yield('customjs')
    @yield('customjq')
</body>

</html>
