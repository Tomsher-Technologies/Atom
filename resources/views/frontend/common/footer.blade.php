<footer class="footer -type-4 mb-20 mt-40">
    <div class="container-fluid">

        <div class="row y-gap-20">
            <div class="col-lg-7 col-md-7">
                <div class="bg-blue-1  pt-60 pl-30 pb-30 rounded-30">
                    <div class="row y-gap-30">
                        <div class="col-lg-4 col-md-4">

                            <div class="text-17 fw-500 text-white uppercase mb-25">{{ get_setting('footer_link1_title') ?? '' }} </div>
                            <div class="d-flex y-gap-10 flex-column text-white">

                                <a href="{{ route('who-we-are') }}">Who We Are</a>
                                <a href="{{ route('mission-vision') }}">Mission & Vision</a>
                                <a href="{{ route('clients') }}">Clients</a>
                                <a href="{{ route('blogs') }}">Blogs</a>
                                <a href="{{ route('webinars') }}">Webinars</a>

                            </div>

                        </div>

                        <div class="col-lg-4 col-md-4">
                            <div class="text-17 fw-500 text-white uppercase mb-25">{{ get_setting('footer_link2_title') ?? '' }} </div>
                            <div class="d-flex y-gap-10 flex-column text-white">
                                <a href="{{ route('trainings') }}">Courses</a>
                                <a href="{{ route('services') }}">Services</a>
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-4">
                            <div class="text-17 fw-500 text-white uppercase mb-25">{{ get_setting('footer_link3_title') ?? '' }} </div>
                            <div class="d-flex y-gap-10 flex-column text-white">
                                <a href="{{ route('career') }}">Career</a>
                                <a href="{{ route('contact') }}">FAQS</a>
                                <a href="#">Privacy Policy</a>
                                <a href="#">Terms of Use</a>
                                <a href="{{ route('contact') }}">Contact Us</a>
                            </div>
                        </div>

                        <div class="row justify-between items-center y-gap-20">
                            <div class="col-lg-12">
                                <hr>
                                <p class="h-100 text-white text-center">
                                    {{ get_setting('copyright') ?? '' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-5">
                <div class="pt-60 pl-30 pb-30 h-100  rounded-30"
                    style="background-image: url({{ asset('assets/img/bg-23.jpg') }}); background-size: cover;background-position: right;">
                    <div class="pt-40 text-center"><img class="m-auto" width="150"
                            src="{{ asset('assets/img/logow.png') }}" alt="">
                    </div>
                    <div class="footer-header-socials home-index mt-40 text-center">
                        <div class="text-17 uppercase text-white fw-500">{{ get_setting('footer_social_title') ?? '' }}</div>
                        <div class="footer-header-socials__list d-flex items-center justify-content-center mt-20 mb-10">
                            <a href="{{ get_setting('facebook') }}" class="bg-white size-40 d-flex justify-center items-center text-white rounded-30">
                              <i class="text-blue-1 icon-facebook"></i>
                            </a>
                            <a href="{{ get_setting('twitter') }}" class="bg-white size-40 d-flex justify-center items-center text-white rounded-30">
                              <i class="text-blue-1 icon-twitter"></i>
                            </a>
                            <a href="{{ get_setting('instagram') }}" class="bg-white size-40 d-flex justify-center items-center text-white rounded-30">
                              <i class="text-blue-1 icon-instagram"></i>
                            </a>
                            <a href="{{ get_setting('linkedin') }}" class="bg-white size-40 d-flex justify-center items-center text-white rounded-30">
                              <i  class="text-blue-1 icon-linkedin"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row justify-between items-center y-gap-20">
                        <div class="col-lg-12">
                            <hr>
                            <p class="h-100 text-white text-center">
                                {!! get_setting('footer_designed') ?? '' !!}
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
</footer>
