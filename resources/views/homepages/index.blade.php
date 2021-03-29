    @extends('/homepages.base')

    @section('pagebody')

        <!--================ Start Home Banner Area =================-->
        <section class="home_banner_area">
            <div class="banner_inner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="banner_content text-center">
                                <p class="text-uppercase">
                                    Best education For Online & Offline
                                </p>
                                <h2 class="text-uppercase mt-4 mb-5" style="color:red">
                                    Lal Bahadur Shastri Training Center
                                </h2>
                                <div>
                                    <a href="#" class="primary-btn2 mb-3 mb-sm-0">learn more</a>
                                    <a href="#" class="primary-btn ml-sm-3 ml-0">see course</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================ End Home Banner Area =================-->

        <!--================ Start Feature Area =================-->
        <section class="feature_area" style="margin-top: -50px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single_feature" style="border-radius: 0px 0px 25px 25px;">
                            <div class="icon"><span class="flaticon-student"></span></div>
                            <div class="desc">
                                <h4 class="mt-3 mb-2">Our Institute</h4>
                                <p> <span class="text-danger font-weight-bold">
                                        Lal Bahadur Shastri Training Center</span> Under The Management Of <br>The manav
                                    kalyan avam vikas sanstha <br> Our Establish Date 27-Jan-2013, <br> 6000+ Students
                                    Trained <br>
                                    Institute Regd. No.: LBSTC/DL/083
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single_feature" style="border-radius: 0px 0px 25px 25px;">
                            <div class="icon"><span class="flaticon-book"></span></div>
                            <div class="desc">
                                <h4 class="mt-3 mb-2">Offline & Online Course</h4>
                                <p>
                                    Computer Software, Hardware & Networking, English Speaking, Nursery Teachers'
                                    Training(N.T.T.), Primary Teacher's Training(P.T.T.), Fashion Designing, 10th & 12TH
                                    From NIOS, University Course
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single_feature" style="border-radius: 0px 0px 25px 25px;">
                            <div class="icon"><span class="flaticon-earth"></span></div>
                            <div class="desc">
                                <h4 class="mt-3 mb-2">Certification Of LBSTC</h4>
                                <p>is registered under The Societies Act XXI of 1860 with the Govt. of NCT Delhi as a
                                    nonprofit and non-governmental organization. It’s under the Management of The Manav
                                    Kalyan Avam Vikas Sanstha.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================ End Feature Area =================-->

        <!--================ Start Information =================-->
        <div class="events_area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="main_title" id="examdate">
                            <h2 class="mb-3 text-white">Exam & Holiday Events</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="single_event position-relative">
                            <div class="event_thumb">
                                <img src="{{ asset('assets/img/event/e4.jpg') }}" alt="" />
                            </div>
                            <div class="event_details">
                                <div class="d-flex mb-4">
                                    <div class="date"><span>{{ substr($dataExam->i_date, 0, 2) }} </span>
                                        {{ substr($dataExam->i_date, 3, 3) }}</div>
                                    <div class="time-location">
                                        <p>
                                            <span class="ti-time mr-2"></span> {{ substr($dataExam->i_date, 7, 4) }}
                                        </p>
                                        <p>
                                            <span class="ti-location-pin mr-2"></span> Vikas Nagar
                                        </p>
                                    </div>
                                </div>
                                <p>
                                    {{ $dataExam['i_info'] }}

                                </p>
                                <div class="primary-btn rounded-0 mt-3">Exam. Details</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single_event position-relative">
                            <div class="event_thumb">
                                <img src="{{ asset('assets/img/event/e3.jpg') }}" alt="" />
                            </div>
                            <div class="event_details">
                                <div class="d-flex mb-4">
                                    <div class="date"><span>{{ substr($dataHoliday->i_date, 0, 2) }}</span>
                                        {{ substr($dataHoliday->i_date, 3, 3) }}</div>

                                    <div class="time-location">
                                        <p>
                                            <span class="ti-time mr-2"></span> {{ substr($dataHoliday->i_date, 7, 4) }}
                                        </p>
                                        <p>
                                            <span class="ti-location-pin mr-2"></span> Vikas Nagar
                                        </p>
                                    </div>
                                </div>
                                <p>
                                    {{ $dataHoliday['i_info'] }}
                                </p>
                                <div class="primary-btn rounded-0 mt-3">Holiday Details</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================ End Information =================-->


        <!--================ Start Popular Courses Area =================-->
        <div class="popular_courses">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="main_title">
                            <h2 class="mb-3" style="color: #002347 !important;">Our Popular Courses</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- single course -->
                    <div class="col-lg-12">
                        <div class="owl-carousel active_course">
                            <div class="single_course">
                                <div class="course_head">
                                    <img class="img-fluid" src="{{ asset('assets/img/courses/c6.jpg') }}" alt="" />
                                </div>
                                <div class="course_content">
                                    <a href="courses.html"> <span class="price">view</span></a>
                                    <h4 class="mb-3">
                                        <a href="course-details.html">Computer Course</a>
                                    </h4>
                                    <p>
                                        India is fast growing in the field of IT (Information Technology). According to some
                                        reports,
                                    </p>
                                </div>
                            </div>

                            <div class="single_course">
                                <div class="course_head">
                                    <img class="img-fluid" src="{{ asset('assets/img/courses/c7.jpg') }}" alt="" />
                                </div>
                                <div class="course_content">
                                    <a href="courses.html"> <span class="price">view</span></a>
                                    <h4 class="mb-3">
                                        <a href="course-details.html">N.T.T. & N.P.T.T.</a>
                                    </h4>
                                    <p>
                                        NPTT will make you eligible to become a teacher at the nursery and primary level
                                    </p>
                                </div>
                            </div>

                            <div class="single_course">
                                <div class="course_head">
                                    <img class="img-fluid" src="{{ asset('assets/img/courses/c8.jpg') }}" alt="" />
                                </div>
                                <div class="course_content">
                                    <a href="courses.html"> <span class="price">view</span></a>
                                    <h4 class="mb-3">
                                        <a href="course-details.html">Hardware & Networking</a>
                                    </h4>
                                    <p>
                                        Comp Hardware is the combination of physical components or parts that makes the
                                        computer system.
                                    </p>
                                </div>
                            </div>

                            <div class="single_course">
                                <div class="course_head">
                                    <img class="img-fluid" src="{{ asset('assets/img/courses/c4.jpg') }}" alt="" />
                                </div>
                                <div class="course_content">
                                    <a href="courses.html"> <span class="price">view</span></a>
                                    <h4 class="mb-3">
                                        <a href="course-details.html">English Speaking</a>
                                    </h4>
                                    <p>
                                        This Course is in essence one where the overriding objective is to improve the
                                        fluency and confidence
                                    </p>
                                </div>
                            </div>

                            <div class="single_course">
                                <div class="course_head">
                                    <img class="img-fluid" src="{{ asset('assets/img/courses/c5.jpg') }}" alt="" />
                                </div>
                                <div class="course_content">
                                    <a href="courses.html"> <span class="price">view</span></a>
                                    <h4 class="mb-3">
                                        <a href="course-details.html">Fashion Designing</a>
                                    </h4>
                                    <p>
                                        While Fashion Design is dedicated to creating clothes as well as lifestyle
                                        accessories,
                                    </p>
                                </div>
                            </div>

                            <div class="single_course">
                                <div class="course_head">
                                    <img class="img-fluid" src="{{ asset('assets/img/courses/c3.jpg') }}" alt="" />
                                </div>
                                <div class="course_content">
                                    <a href="courses.html"> <span class="price">view</span></a>
                                    <h4 class="mb-3">
                                        <a href="course-details.html">NIOS & University</a>
                                    </h4>
                                    <p>
                                        B.A., B.COM, B.C.A.,B.B.A., M.B.A., M.C.A, M.COM, M.A. From recognized university
                                        and 10th and 12th From N.I.O.S.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================ End Popular Courses Area =================-->

        <!--================ Start Trainers Area =================-->
        <div class="section_gap registration_area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="main_title">
                            <h2 class="mb-3" style="color: white;">Our Expert Trainers</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center d-flex align-items-center">
                    <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
                        <div class="thumb d-flex justify-content-sm-center">
                            <img class="img-fluid" src="{{ asset('assets/img/trainer/sahitya.jpg') }}" alt="" />
                        </div>
                        <div class="meta-text text-sm-center bg-secondary">
                            <h4>Sahitya Karn</h4>
                            <p class="designation" style="margin-bottom: 5px;">Institute Administrator</p>
                            <p>
                                Compupter & Hardware
                            </p>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
                        <div class="thumb d-flex justify-content-sm-center">
                            <img class="img-fluid" src="{{ asset('assets/img/trainer/sunita.jpg') }}" alt="" />
                        </div>
                        <div class="meta-text text-sm-center bg-secondary">
                            <h4>Sunita Pal</h4>
                            <p class="designation" style="margin-bottom: 5px;">Sr. Faculty</p>
                            <p>
                                Teaching : Compupter </p>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
                        <div class="thumb d-flex justify-content-sm-center">
                            <img class="img-fluid" src="{{ asset('assets/img/trainer/nisha.jpg') }}" alt="" />
                        </div>
                        <div class="meta-text text-sm-center bg-secondary">
                            <h4>Nisha Kumari</h4>
                            <p class="designation" style="margin-bottom: 5px;">Sr. Faculty</p>
                            <p>
                                Teaching : Compupter
                            </p>

                        </div>
                    </div>


                    <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
                        <div class="thumb d-flex justify-content-sm-center">
                            <img class="img-fluid" src="{{ asset('assets/img/trainer/manju.jpg') }}" alt="" />
                        </div>
                        <div class="meta-text text-sm-center bg-secondary">
                            <h4>Manju Dubey</h4>
                            <p class="designation" style="margin-bottom: 5px;">Sr. Faculty</p>
                            <p>
                                Teaching : N.P.T.T.
                            </p>

                        </div>
                    </div>


                    <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
                        <div class="thumb d-flex justify-content-sm-center">
                            <img class="img-fluid" src="{{ asset('assets/img/trainer/rajkumar.jpg') }}" alt="" />
                        </div>
                        <div class="meta-text text-sm-center bg-secondary">
                            <h4>Raj Kumar</h4>
                            <p class="designation" style="margin-bottom: 5px;">Jr. Facuilt</p>
                            <p>
                                Teaching : Compupter
                            </p>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
                        <div class="thumb d-flex justify-content-sm-center">
                            <img class="img-fluid" src="{{ asset('assets/img/trainer/jaikishan.jpg') }}" alt="" />
                        </div>
                        <div class="meta-text text-sm-center bg-secondary">
                            <h4>Jai Kishan Rajbhar</h4>
                            <p class="designation" style="margin-bottom: 5px;">Jr. Faculty</p>
                            <p>
                                Teaching : Compupter
                            </p>

                        </div>
                    </div>


                    <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
                        <div class="thumb d-flex justify-content-sm-center">
                            <img class="img-fluid" src="{{ asset('assets/img/trainer/neha.jpg') }}" alt="" />
                        </div>
                        <div class="meta-text text-sm-center bg-secondary">
                            <h4>Neha Karn</h4>
                            <p class="designation" style="margin-bottom: 5px;">Sr. Faculty</p>
                            <p>
                                Teaching : Fashion Designing
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================ End Trainers Area =================-->
    @endsection
