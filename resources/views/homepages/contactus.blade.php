    @extends('/homepages.base')

    @section('pagebody')


        <!--================Home Banner Area =================-->
        <section class="banner_area" style="">
            <div class="banner_inner d-flex align-items-center">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="banner_content text-center">
                                <h2>Contact Us</h2>
                                <div class="page_link">
                                    <a href="/">Home</a>
                                    <a href="#">Contact us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->

        <!--================Contact Area =================-->
        <section class="contact_area section_gap">
            <div class="container">
                <div class="row">
                    <div id="" class="col-lg-7">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.406499690499!2d77.04115921460439!3d28.647544790153148!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d056df37712cb%3A0x46c21c7fe561df2d!2sLAL%20BAHADUR%20SHASTRI%20TRAINING%20CENTRE!5e0!3m2!1sen!2sin!4v1614171818017!5m2!1sen!2sin"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <div class="col-lg-5">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="contact_info">
                                    <div class="info_item">
                                        <i class="ti-home"></i>
                                        <h6>Lal Bahadur Shastri Traninig Center Vikas Nagar</h6>
                                        <p>13/3 1st Floor R Block Main Ranhola Road Near bikaner sweet, Vikas Nagar, Uttam
                                            Nagar,
                                            New Delhi, Delhi 110059</p>
                                    </div>
                                    <div class="info_item">
                                        <i class="ti-headphone"></i>
                                        <h6><a href="#">Call : 9136157744, </a> <a href="#">Whatsup : 9599007788</a></h6>
                                        <p>Mon to Sat 8 am to 7 pm</p>
                                    </div>
                                    <div class="info_item">
                                        <i class="ti-time"></i>
                                        <h6><a href="#">Open 8 am to 7 pm</a></h6>
                                        <p>Mon to Sat</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <form class="row contact_form" action="emessage_submit" method="post" id="contactForm">
                                    @csrf
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Enter your name" onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Enter your name'" required="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="mobile" name="mobile"
                                                placeholder="Enter Mobile no" onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Enter Mobile no'" required="" maxlength="10" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="subject" name="subject"
                                                placeholder="Enter Subject" onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Enter Subject'" required="" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <textarea class="form-control" name="msg" id="msg" rows="1"
                                                placeholder="Enter Message" onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Enter Message'" required=""></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button type="submit" value="submit" class="btn primary-btn">
                                            Send Message
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Contact Area =================-->




    @endsection
