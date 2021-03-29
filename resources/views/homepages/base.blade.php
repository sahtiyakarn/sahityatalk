<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" type="image/png" />
    <title>sahityatalk | Home </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/nice-select/css/nice-select.css') }}" />
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    @yield('customcss')
    <style>
        .sidebar-form {
            position: fixed;
            top: 50%;
            right: -350px;
            width: 350px;
            box-shadow: 0 0 5px rgba(0, 0, 0, .3);
            border-radius: 8px 0 0 8px;
            background-color: white;
            padding: 20px;
            transform: translatey(-50%);
            transition: right .4s linear;
            z-index: 1000;

        }

        .sidebar-form.show {
            right: 0;
        }

        .sidebar-form .call-action {
            position: absolute;
            background-color: #fdc632;
            font-weight: 400;
            letter-spacing: 1px;
            color: white;
            width: 150px;
            height: 40px;
            text-align: center;
            line-height: 40px;
            cursor: pointer;
            left: -95px;
            top: 50%;
            transform: translateY(-50%) rotate(-90deg);
        }

        @media screen and (max-width: 360px) {
            .sidebar-form {
                position: fixed;
                top: 40%;
                right: -166px;
                width: 320px;
                box-shadow: 0 0 5px rgba(0, 0, 0, .3);
                border-radius: 8px 0 0 8px;
                background-color: white;
                padding: 20px;
                transform: translatey(-50%);
                transition: right .4s linear;
                z-index: 1000;

            }

            .sidebar-form.show {
                right: 155px;
            }

            .sidebar-form .call-action {
                position: absolute;
                background-color: #fdc632;
                font-weight: 400;
                letter-spacing: 1px;
                color: rgb(248, 244, 244);
                width: 140px;
                height: 30px;
                text-align: center;
                line-height: 30px;
                cursor: pointer;
                left: -86px;
                top: 50%;
                transform: translateY(-50%) rotate(-90deg);
            }
        }

    </style>
</head>

<body>

    {{-- side enquiry --}}
    <div class="sidebar-form">
        <div class="call-action">
            <span>ENQUIRY</span>
        </div>
        <h3 class="text-center text-dark">Enquiry Form</h3>
        <form action="enquiryadd" method="POST">
            @csrf

            <div class="form-group">
                <input type="text" name="name" id="" class="form-control" placeholder="Enter your Name">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" name="mobileno" id="" class="form-control" maxlength="10"
                    placeholder="Enter Mobile no">
                @error('mobileno')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <div class="col-12">
                    <div class="form-row">
                        <label class="col-sm-2 col-form-label" for="name"> <span style="margin-top: 10px;">Course</span>
                        </label>
                        @php
                            $list = ['Computer Software' => 'Computer Software', 'Hardware & Networking' => 'Hardware & Networking', 'English Speaking' => 'English Speaking', 'NTT' => 'NTT', 'NPTT' => 'NPTT', 'Fashion Designing' => 'Fashion Designing'];
                        @endphp
                        {!! Form::select('course', $list, '', ['class' => 'form-control col-sm-9 offset-sm-1']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="info" id="" rows="5"
                    placeholder="write Information Here "></textarea>
            </div>
            <input type="submit" value="send enquiry" id="submit-btn" class="btn btn-danger" style="border-top-right-radius: 1.5625rem;
    border-bottom-left-radius: 1.5625rem;">

        </form>
    </div>
    {{-- end enquiry --}}


    <!--================ Start Header Menu Area =================-->
    <div class="" id="" style="background-color: #fdc632">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 font-weight-bold">
                    e-Mail : sahityatalk@gmail.com
                </div>
                <div class="col-lg-5 offset-lg-3 text-right font-weight-bold">
                    Contact Us: 9136157744, Whatsapp: 9599007788
                </div>
            </div>
        </div>
    </div>
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="/"><img src="{{ asset('assets/img/logo.png') }}"
                            alt="" /></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span> <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/aboutus">About</a>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Course</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/course">Computer Software</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="">Hardware & Net.</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="">N.P.T.T.</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="">English Speaking</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="">Fashion Designing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="">NIOS & University</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">Career</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/contactus">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a href="/login" class="nav-link">
                                    Login
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================ End Header Menu Area =================-->

    @yield('pagebody')
    <br><br><br>
    <!--================ Start footer Area  =================-->
    <footer class="footer-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-6 single-footer-widget">
                    <h4>Top Course</h4>
                    <ul>
                        <li><a href="#">Python With Djanog</a></li>
                        <li><a href="#">PHP With mysql</a></li>
                        <li><a href="#">Web-Designing</a></li>
                        <li><a href="#">AutoCad</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 single-footer-widget">
                    <h4>Top Course</h4>
                    <ul>
                        <li><a href="#">Tally Prime</a></li>
                        <li><a href="#">Multimedia</a></li>
                        <li><a href="#">Graphic Designing</a></li>
                        <li><a href="#">3D Max</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 single-footer-widget">
                    <h4>Information</h4>
                    <ul>
                        <li><a href="/index#examdate">Exam Date</a></li>
                        <li><a href="/index#examdate">Holiday Date</a></li>
                        <li><a href="/emarksheet_find">Show Result</a></li>
                    </ul>


                    <div class="row">
                        <div class="row footer-bottom d-flex" style="margin-top: 0px;">
                            <div class="col-lg-12 footer-social">
                                <a href="#"><i class="ti-facebook"></i></a>
                                <a href="#"><i class="ti-linkedin"></i></a>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="col-lg-6 col-md-6 single-footer-widget">
                    <h4>Contact us:</h4>
                    <ul>
                        <li><a href="#"> R-13/3 1st Floor R Block Main Ranholla Raod Vikas Nagar New Delhi</a></li>
                        <li><a href="#">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.4064996905327!2d77.04115921508108!3d28.64754479015214!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d056df37712cb%3A0x46c21c7fe561df2d!2sLAL%20BAHADUR%20SHASTRI%20TRAINING%20CENTRE!5e0!3m2!1sen!2sin!4v1613121028675!5m2!1sen!2sin"
                                    width="500" height="100" frameborder="0" style="border:0;" allowfullscreen=""
                                    aria-hidden="false" tabindex="0"></iframe>
                            </a></li>
                    </ul>
                </div>
            </div>

            <div class="row d-flex justify-content-between">
                <div class="col-lg-8 col-sm-12 text-white">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());

                    </script> All rights reserved | This is made with <i class="ti-heart" aria-hidden="true"></i> by <a
                        href="#" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
            </div>

        </div>
    </footer>
    <!--================ End footer Area  =================-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel-thumb.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/js/mail-script.js') }}"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="{{ asset('assets/js/gmaps.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    @yield('customjs')
    <script>
        $(document).ready(function() {
            $(".sidebar-form .call-action").click(function() {
                $(this).parents(".sidebar-form").toggleClass("show")
            })
        })

    </script>
</body>

</html>
