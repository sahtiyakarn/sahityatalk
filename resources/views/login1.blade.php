<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SahityaTalk | Log in</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="login-box">
                    <div class="card card-outline card-primary">
                        <div class="card-header text-center bg-dark"><a href="/"><img
                                    src="{{ asset('assets/img/logo.png') }}"></a></div>
                        <div class=" card-body">
                            <p class="login-box-msg">Student Login </p>
                            <form action="/stuCheck" method="post"> @csrf <div class="input-group mb-3"><input
                                        type="text" name="student" class="form-control" placeholder="student Name">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                                    </div>
                                </div>
                                <div class="input-group mb-3"><input type="password" name="password"
                                        class="form-control" placeholder="Password">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><span class="fas fa-lock"></span></div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-6"><button type="submit" class="btn btn-primary btn-block">Student
                                            Sign In</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="login-box">
                    <div class="card card-outline card-primary">
                        <div class="card-header text-center bg-dark"><a href="/"><img
                                    src="{{ asset('assets/img/logo.png') }}"></a></div>
                        <div class=" card-body">
                            <p class="login-box-msg">Attendance Login </p>
                            <form action="/attendance/tecCheck" method="post">
                                @csrf
                                <div class="input-group mb-3"><input type="text" name="teacher" class="form-control"
                                        placeholder="Teacher name">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                                    </div>
                                </div>
                                <div class="input-group mb-3"><input type="password" name="password"
                                        class="form-control" placeholder="Password">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><span class="fas fa-lock"></span></div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-6"><button type="submit" class="btn btn-primary btn-block">Teacher
                                            Sign In</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col md-12 text-center">
                @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert"> {{ Session::get('error') }} </div>
                @endif
            </div>
        </div>
    </div>
    <script src="{{ asset('adminlte/js/jquery.min.js') }}"></script>
    <script src="{{ asset('adminlte/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminlte/js/adminlte.min.js') }}"></script>
</body>

</html>
