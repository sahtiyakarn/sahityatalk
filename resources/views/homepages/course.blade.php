    @extends('/homepages.base')

    @section('pagebody')

        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="banner_content text-center">
                                <h2>About Us</h2>
                                <div class="page_link">
                                    <a href="/">Home</a>
                                    <a href="#">About Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        <div class="container">
            <div class="row pt-3">
                <div class="col-lg-3 bg-light">
                    <a class="btn btn-info btn-block">Computer</a>
                    <a class="btn btn-info btn-block">Hardware & Networking</a>
                    <a class="btn btn-info btn-block">English Speaking</a>
                    <a class="btn btn-info btn-block">Nursery Teacher Training </a>
                    <a class="btn btn-info btn-block">Fashion Designning</a>
                    <a class="btn btn-info btn-block">Cutting & Trailoring</a>
                    <a class="btn btn-info btn-block">NIOS</a>
                    <a class="btn btn-info btn-block">University</a>

                </div>
                <div class="col-lg-9">


                    <div class="row">
                        @foreach ($data as $item)
                            <div class="col-lg-6 pb-4">
                                <div class="card">
                                    <div class="card-header text-center text-capitalize">
                                        <h3>{{ $item->name }}</h3>
                                    </div>
                                    <div class="card-body" style="background:#E8E8E8;">
                                        <div class="card-title text-center">
                                            <img src="{{ asset('assets/img/course_img/cacs.jpg') }}" alt=""
                                                class="img-bordered img-fluid img-responsive"
                                                style="width: 300px;border:3px solid red;">
                                        </div>
                                        <p class="card-text text-center">
                                            {{ $item->description }}
                                        </p>
                                    </div>
                                    <div class="card-footer text-muted">
                                        <div class="row">
                                            <div class="col-lg-6">Admission Fee : {{ $item->r_fee }}</div>
                                            <div class="col-lg-6">Monthly Fee : {{ $item->m_fee }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">Duration : {{ $item->duration }}</div>
                                            <div class="col-lg-6"><a href="#" class="btn btn-dark btn-sm">Details</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    @endsection
