<footer class="footer-type-2 footer-bg-img footer -type-1 -f-links">
    <div class="container">
        <div class="footer-header">
            <div class="row y-gap-20 justify-between items-center">
                <div class="col-auto">
                    <div class="footer-header__logo">
                        <img width="200" src="{{ asset('assets/img/logo-b.png') }}" alt="logo">
                    </div>
                </div>

                <div class="col-auto">
                    <div class="footer-header-socials">
                        <div class="footer-header-socials__title text-black">
                            <img width="40" src="{{ asset('assets/img/icons/phone2.svg') }}" alt="logo">
                        </div>
                        <p>
                            {{ get_setting('phone') }}
                        </p>

                    </div>
                </div>

                <div class="col-auto">
                    <div class="footer-header-socials">
                        <div class="footer-header-socials__title text-black">
                            <img width="40" src="{{ asset('assets/img/icons/mail2.svg') }}" alt="logo">
                        </div>
                        <p>
                            {{ get_setting('email') }}
                        </p>
                    </div>
                </div>

                <div class="col-auto">
                    <div class="footer-header-socials">
                        <div class="footer-header-socials__title text-black">{{ get_setting('footer_social_title') ?? '' }}</div>
                        <div class="footer-header-socials__list">
                            <a href="{{ get_setting('facebook') }}"><i class="icon-facebook"></i></a>
                            <a href="{{ get_setting('twitter') }}"><i class="fa-brands fa-x-twitter"></i></a>
                            <a href="{{ get_setting('instagram') }}"><i class="icon-instagram"></i></a>
                            <a href="{{ get_setting('linkedin') }}"><i class="icon-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-columns">
            <div class="row y-gap-30">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="text-17 fw-500 text-black uppercase mb-25">{{ get_setting('footer_link1_title') ?? '' }}</div>
                    <div class="ft-text-dark-all d-flex y-gap-10 flex-column">
                        <a href="{{ route('who-we-are') }}">Who We Are</a>
                        <a href="{{ route('mission-vision') }}">Mission & Vision</a>
                        <a href="{{ route('clients') }}">Clients</a>
                        <a href="{{ route('blogs') }}">Blogs</a>
                        <a href="{{ route('webinars') }}">Webinars</a>
                        <a href="{{ route('downloads') }}">Downloads</a>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="text-17 fw-500 text-black uppercase mb-25">Courses</div>
                    @php
                        $header_courses = get_footer_courses();
                    @endphp
                    <div class="ft-text-dark-all d-flex y-gap-10 flex-column">
                        @foreach ($header_courses  as $hc)
                            <a href="{{ route('courses',['slug' => $hc['slug'] ]) }}">{{ $hc['name'] }}</a>
                        @endforeach
                    </div>
                        
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="text-17 fw-500 text-black uppercase mb-25">Services</div>
                    @php
                        $header_services = get_footer_services();
                    @endphp
                    <div class="ft-text-dark-all d-flex y-gap-10 flex-column">
                        @foreach ($header_services  as $hs)
                            <a href="{{ route('service-details',['slug' => $hs['slug'] ]) }}">{{ $hs['name'] }}</a>
                        @endforeach
                    </div>
                </div>

                <div class="col-xl-2 offset-xl-1 col-lg-4 col-md-6">
                    <div class="text-17 fw-500 text-black uppercase mb-25">{{ get_setting('footer_link3_title') ?? '' }}</div>
                    <div class="ft-text-dark-all d-flex y-gap-10 flex-column">
                        <a href="{{ route('careerlisting') }}">Career</a>
                        <a href="{{ route('contact') }}#faqDiv">FAQS</a>
                        <a href="{{ route('privacy') }}">Privacy Policy</a>
                        <a href="{{ route('terms') }}">Terms of Use</a>
                        <a href="{{ route('contact') }}">Contact Us</a>
                        <a href="{{ route('certificate') }}">Quality Certificate</a>
                    </div>
                </div>


            </div>
        </div>

    </div>
</footer>

<div class="bg-blue-1">
    <div class="container">
        <div class="py-15 border-top-light-15">
            <div class="row justify-between items-center y-gap-20">
                <div class="col-auto">
                    <div class="d-flex items-center h-100 text-white">
                        {{ get_setting('copyright') ?? '' }}
                    </div>
                </div>

                <div class="col-auto">
                    <div class="d-flex x-gap-20 y-gap-20 items-center flex-wrap">
                        <div>
                            <div class="d-flex x-gap-15 text-white">
                                <p> {!! get_setting('footer_designed') ?? '' !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>