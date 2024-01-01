<header data-anim="fade" data-add-bg="bg-dark-1" class="header -type-1 js-header">
    <div class="header__container">
        <div class="row justify-between items-center">
            <div class="col-auto">
                <div class="header-left">
                    <div class="header__logo ">
                        <a data-barba href="{{ route('home') }}">
                            <img width="150" src="{{ asset('assets/img/logo-b.png') }}" alt="logo">
                        </a>
                    </div>
                </div>
            </div>
            <div class="header-menu js-mobile-menu-toggle ">
                <div class="header-menu__content">
                    <div class="mobile-bg js-mobile-bg"></div>
                    <div class="menu js-navList">
                        <ul class="menu__nav text-black -is-active">
                            <li>
                                <a data-barba href="{{ route('home') }}" class="h-100 header-home-icon">
                                <i class="fa fa-home"></i>
                                </a>
                            </li>
                            <li> 
                                @if(Route::currentRouteName() == 'services' || Route::currentRouteName() == 'service-details')
                                    <a data-barba href="{{ route('consultancy-services') }}">Home</a>
                                @elseif(Route::currentRouteName() == 'trainings' || Route::currentRouteName() == 'courses' || Route::currentRouteName() == 'course-details')
                                    <a data-barba href="{{ route('training-courses') }}">Home</a>
                                @else
                                    <a data-barba href="{{ route('home') }}">Home</a>
                                @endif
                                
                            </li>
                            <li class="menu-item-has-children -has-mega-menu">
                                <a data-barba href="{{ route('who-we-are') }}">
                                    ABOUT <i class="icon-chevron-right text-13 ml-10"></i>
                                </a>
                                <div class="mega xl:d-none">
                                    <div class="mega__menu">
                                        <div class="row x-gap-40">
                                            <div class="col-lg-4">
                                                <div class="about-mega-sec-1">
                                                    <h2>
                                                        {{ get_setting('about_content') }}
                                                    </h2>
                                                    <a class="pt-30" href="{{ get_setting('about_button_link') }}">{{ get_setting('about_button_text') }}</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="about-mega-sec-2">
                                                    <h4 class="text-17 fw-500 mb-20 text-white">About ATOM</h4>
                                                    <ul class="mega__list">
                                                        <li><a data-barba href="{{ route('who-we-are') }}">Who We Are</a></li>
                                                        <li><a data-barba href="{{ route('mission-vision') }}">Mission & Vision</a></li>
                                                        <li><a data-barba href="{{ route('clients') }}">Partners & Clients</a></li>
                                                        <li><a data-barba href="{{ route('careerlisting') }}">Career</a></li>
                                                        <li><a data-barba href="{{ route('teams') }}">Management</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mega-banner ml-40">
                                                    <img src="{{ get_setting('about_image') }}" alt="">
                                                    <a href="#" class="blog-title">{{ get_setting('about_title') }} </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="subnav d-none xl:d-block">
                                    <li class="menu__backButton js-nav-list-back">
                                        <a href="#"><i class="icon-chevron-left text-13 mr-10"></i> 
                                            About ATOM</a>
                                    </li>
                                    <li><a data-barba href="{{ route('who-we-are') }}">Who We Are</a></li>
                                    <li><a data-barba href="{{ route('mission-vision') }}">Mission & Vision</a></li>
                                    <li><a data-barba href="{{ route('clients') }}">Partners & Clients</a></li>
                                    <li><a data-barba href="{{ route('careerlisting') }}">Career</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children -has-mega-menu">
                                <a data-barba href="#">Courses <i class="icon-chevron-right text-13 ml-10"></i></a>
                                <div class="mega xl:d-none">
                                    <div class="mega__menu">
                                        <div class="row x-gap-40">
                                            <div class="col-lg-4">
                                                <div class="about-mega-sec-1">
                                                    <h2>
                                                        {{ get_setting('course_content') }}
                                                    </h2>
                                                    <a class="pt-30" href="{{ route('trainings') }}">{{ get_setting('course_button_text') }}</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="about-mega-sec-2">
                                                    {{-- <h4 class="text-17 fw-500 mb-20 text-white"> Courses</h4> --}}
                                                    @php
                                                        $header_courses = get_header_courses();
                                                        $mob_header_courses = '';
                                                    @endphp
                                                    <ul class="mega__list">
                                                        @foreach ($header_courses  as $hc)
                                                            <a href="{{ route('training-categories',['slug' => $hc['slug'] ]) }}">{{ $hc['name'] }}</a>

                                                            @php
                                                                $mob_header_courses .= '<li><a data-barba href="'.route('training-categories',['slug' => $hc['slug'] ]) .'">'.$hc['name'].'</a></li>';
                                                            @endphp
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <ul class="subnav d-none xl:d-block">
                                    <li class="menu__backButton js-nav-list-back">
                                        <a href="#"><i class="icon-chevron-left text-13 mr-10"></i> Courses</a>
                                    </li>
                                    {!! $mob_header_courses !!}
                                </ul>
                            </li>
                            <li class="menu-item-has-children -has-mega-menu">
                                <a data-barba href="#">Services <i class="icon-chevron-right text-13 ml-10"></i></a>
                                <div class="mega xl:d-none">
                                    <div class="mega__menu">
                                        <div class="row x-gap-40">
                                            <div class="col-lg-4">
                                                <div class="about-mega-sec-1">
                                                    <h2>
                                                        {{ get_setting('service_content') }}
                                                    </h2>
                                                    <a class="pt-30" href="{{ route('services') }}">{{ get_setting('service_button_text') }}</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="about-mega-sec-2">
                                                    {{-- <h4 class="text-17 fw-500 mb-20 text-white"> Courses</h4> --}}
                                                    @php
                                                        $header_services = get_header_services();
                                                        $mob_header_services = '';
                                                    @endphp
                                                    <ul class="mega__list">
                                                        @foreach ($header_services  as $hs)
                                                            <a href="{{ route('service-details',['slug' => $hs['slug'] ]) }}">{{ $hs['name'] }}</a>
                                                            @php
                                                                $mob_header_services .= '<li><a data-barba href="'.route('service-details',['slug' => $hs['slug'] ]).'">'.$hs['name'].'</a></li>';
                                                            @endphp
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <ul class="subnav d-none xl:d-block">
                                    <li class="menu__backButton js-nav-list-back">
                                        <a href="#"><i class="icon-chevron-left text-13 mr-10"></i> Courses</a>
                                    </li>
                                    {!! $mob_header_services !!}
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a data-barba href="#">MEDIA CENTER <i class="icon-chevron-right text-13 ml-10"></i></a>
                                <ul class="subnav">
                                    <li class="menu__backButton js-nav-list-back">
                                        <a href="#"><i class="icon-chevron-left text-13 mr-10"></i> MEDIA CENTER</a>
                                    </li>
                
                                    <li><a href="{{ route('webinars') }}">Webinars</a></li>
                
                                    <li><a href="{{ route('blogs') }}">Blogs</a></li>
                                </ul>
                              </li>
                            <li>
                                <a data-barba href="{{ route('contact') }}">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="mobile-footer px-20 py-20 border-top-light js-mobile-footer">
                        <div class="mobile-footer__number">
                            <div class="text-17 fw-500 text-dark-1">Call us</div>
                            <div class="text-17 fw-500 text-purple-1">{{ get_setting('phone') }}</div>
                        </div>
                        <div class="lh-2 mt-10">
                            <div>{{ get_setting('address') }}</div>
                            <div>{{ get_setting('email') }}</div>
                        </div>
                        <div class="mobile-socials mt-10">
                            <a href="{{ get_setting('facebook') }}" class="d-flex items-center justify-center rounded-full size-40">
                                <i class="icon-facebook"></i>
                            </a>
                            <a href="{{ get_setting('twitter') }}" class="d-flex items-center justify-center rounded-full size-40">
                                <i class="fa-brands fa-x-twitter"></i>
                            </a>
                            <a href="{{ get_setting('instagram') }}" class="d-flex items-center justify-center rounded-full size-40">
                                <i class="icon-instagram"></i>
                            </a>
                            <a href="{{ get_setting('linkedin') }}" class="d-flex items-center justify-center rounded-full size-40">
                                <i class="icon-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-menu-close" data-el-toggle=".js-mobile-menu-toggle">
                    <div class="size-40 d-flex items-center justify-center rounded-full bg-white">
                        <div class="icon-close text-dark-1 text-16"></div>
                    </div>
                </div>
                <div class="header-menu-bg"></div>
            </div>
            <div class="col-auto">
                <div class="header-right d-flex items-center">
                    <div class="header-right__icons text-white d-flex items-center">
                        <div class="d-none xl:d-block ml-20">
                            <button class="text-white items-center" data-el-toggle=".js-mobile-menu-toggle">
                                <i class="text-11 icon icon-mobile-menu"></i>
                            </button>
                        </div>
                    </div>
                    <div class="header-right__buttons d-flex items-center ml-30 md:d-none">
                        <a href="tel:+{{ get_setting('call_back_phone')}}"
                            class="button px-35 h-40 -gradient-1 text-white -rounded ml-30 xl:ml-20">CALL ME BACK</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>