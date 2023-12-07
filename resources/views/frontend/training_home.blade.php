@extends('layouts.app.sub')
@section('content')
    <section class="masthead -type-1 js-mouse-move-container">
        <div class="masthead__bg">
            <img src="{{ asset('assets/img/bg1.jpg') }}" alt="image">
        </div>

        <div class="container">
            <div data-anim-wrap class="row y-gap-30 justify-between items-center">
                <div class="col-xl-6 col-lg-6 col-sm-10">
                    <div class="masthead__content">
                        <p data-anim-child="slide-up delay-1" class="masthead__text">
                            {!! $page->title ?? '' !!}
                        </p>
                        <h1 data-anim-child="slide-up" class="masthead__title">
                            {!! $page->sub_title ?? '' !!}
                        </h1>

                        <div data-anim-child="slide-up delay-2" class="masthead__buttons row x-gap-10 y-gap-10">
                            <div class="col-12 col-sm-auto">
                                <a data-barba href="{{ $page->button_link_1 }}"
                                    class="button -md -gradient-1 text-white">{!! $page->btn_text1 ?? '' !!}</a>
                            </div>
                        </div>

                    </div>
                </div>

                <div data-anim-child="slide-up delay-5" class="col-xl-6 col-lg-6">
                    <div class="masthead-image">
                        <div class="masthead-image__el1">
                            <img class="js-mouse-move" data-move="40" src="{{ $page->getImage1() }}" alt="image">
                        </div>

                        <div class="masthead-image__el2">
                            <img class="js-mouse-move" data-move="70" src="{{ $page->getImage2() }}" alt="image">
                        </div>

                        <div class="masthead-image__el3">
                            <img class="js-mouse-move" data-move="40" src="{{ $page->getImage3() }}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section data-anim-wrap class="masthead -type-7 container-fluid">
        <div class="masthead__bg rounded-30">
            <img src="{{ asset('assets/img/bg-23.jpg') }}" alt="image">
        </div>

        <div class="container">
            <div class="row y-gap-20 justify-between items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="masthead__content">
                        <h2 data-anim-child="slide-up delay-3" class="masthead__title text-white">
                            {!! $page->heading1 !!}
                        </h2>
                        <p data-anim-child="slide-up delay-4" class="masthead__text text-16 lh-2 text-white pt-10">
                            {!! $page->content1 !!}
                        </p>

                        <div data-anim-child="slide-up delay-5">
                            <div class="masthead-form rounded-16 mt-30 px-10 py-10">
                                <form action="{{ route('search-course') }}" method="GET"
                                    class="search-bar-form d-grid y-gap-10 items-center">

                                    <div class="masthead-form__item w-100  bg-white rounded-8">
                                        <div class="d-flex items-center w-100">
                                            <i class="icon-search mr-10 ml-10"></i>
                                            <input type="text" placeholder="Your Search" name="keyword"
                                                value="{{ $search ?? '' }}">
                                        </div>
                                    </div>


                                    <div class="rounded-8">
                                        <div class=" dropdown js-dropdown w-1/1 bg-white">
                                            <div class="d-flex items-center justify-between text-dark-1 -dark-text-dark-1">
                                                <div class="d-flex items-center">
                                                    <img class="mr-10 ml-10" src="{{ asset('assets/img/icons/type.svg') }}"
                                                        alt="icon">
                                                    <!--<span class="js-dropdown-title">Course Type </span>-->
                                                </div>
                                                <i class="icon text-9 icon-chevron-down ml-10"></i>
                                            </div>

                                            <div class="dropdown__item shadow-1 rounded-8">
                                                <select class="form-control js-dropdown-list" name="course_type">
                                                    <option value="">Select Course Type </option>
                                                    <option value="2">Face To Face</option>
                                                    <option value="1">Online</option>
                                                </select>
                                            </div>

                                        </div>


                                    </div>



                                    <div class="rounded-8">
                                        <div class="dropdown js-dropdown w-1/1 bg-white">
                                            <div class="d-flex items-center justify-between text-dark-1 -dark-text-dark-1">
                                                <div class="d-flex items-center">
                                                    <img class="mr-10  ml-10" src="{{ asset('assets/img/icons/type.svg') }}"
                                                        alt="icon">
                                                    <!--<span class="js-dropdown-title">Category</span>-->
                                                </div>
                                                <i class="icon text-9 icon-chevron-down ml-10"></i>
                                            </div>

                                            <div class="dropdown__item shadow-1">


                                                @php
                                                    $categories = App\Models\TrainingCategories::where('status', 1)
                                                        ->orderBy('name', 'asc')
                                                        ->get();
                                                @endphp

                                                <div class="dropdown__item shadow-1 rounded-8">
                                                    <select class="form-control js-dropdown-list" name="categories">
                                                        <option value="">Select Course Category</option>
                                                        @foreach ($categories as $categ)
                                                            <option value="{{ $categ->id }}">{!! $categ->name !!}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="rounded-8">
                                        <div class="dropdown js-dropdown w-1/1 bg-white">
                                            <div class="d-flex items-center justify-between text-dark-1 -dark-text-dark-1">
                                                <div class="d-flex items-center">
                                                    <img class="mr-10  ml-10"
                                                        src="{{ asset('assets/img/icons/location.svg') }}" alt="icon">
                                                    <!--<span class="js-dropdown-title">City</span>-->
                                                </div>
                                                <i class="icon text-9 icon-chevron-down ml-10"></i>
                                            </div>

                                            <div class="dropdown__item shadow-1 rounded-8">


                                                @php
                                                    $locations = getCourseLocations();

                                                @endphp

                                                <select class="form-control js-dropdown-list" name="location">
                                                    <option value="">Select Location</option>
                                                    @foreach ($locations as $loc)
                                                        <option value="{{ $loc['id'] }}">{!! $loc['name'] !!}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>


                                    <div class=" rounded-8">
                                        <div class="dropdown js-dropdown w-1/1 bg-white">
                                            <div class="d-flex items-center justify-between text-dark-1 -dark-text-dark-1">
                                                <div class="d-flex items-center">
                                                    <img class="mr-10 ml-10"
                                                        src="{{ asset('assets/img/icons/lang.svg') }}" alt="icon">
                                                    <!--<span class="js-dropdown-title">Language</span>-->
                                                </div>
                                                <i class="icon text-9 icon-chevron-down ml-10"></i>
                                            </div>

                                            <div class="dropdown__item shadow-1 rounded-8">

                                                <select class="form-control js-dropdown-list" name="language">
                                                    <option value="">Select Course Language</option>
                                                    <option value="1">English</option>
                                                    <option value="2">Arabic</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="masthead-form__button p-0">
                                        <button type="submit"
                                            class="button w-100 h-100 -gradient-1 text-white rounded-8 ">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div data-anim-child="slide-up delay-6">
                            {{-- <div class="text-light-5 mt-20">Trending Search: Training, Courses, Aviation, Civil</div> --}}
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-md">
        <div data-anim-wrap class="container">
            <div class="row justify-center text-center">
                <div class="col-auto">

                    <div class="sectionTitle ">

                        <h2 class="sectionTitle__title ">{!! $page->heading2 !!}</h2>

                        <p class="sectionTitle__text "> {!! $page->content2 !!}</p>

                    </div>

                </div>
            </div>

            <div class="overflow-hidden pt-50 js-section-slider" data-gap="30" data-loop data-pagination
                data-slider-cols="xl-6 lg-4 md-2 sm-2">
                <div class="swiper-wrapper">
                    @if ($categories)
                        @foreach ($categories as $catg)
                            <div class="swiper-slide">
                                <div data-anim-child="slide-left delay-2" class="featureCard -type-1 -featureCard-hover">
                                    <div class="featureCard__content">
                                        <a href="{{ route('courses', ['slug' => $catg->slug]) }}">
                                            <div class="featureCard__icon bg-orange-2">
                                                <img src="{{ $catg->getHomeIcon() }}" alt="icon">
                                            </div>
                                            <div class="featureCard__title">{{ $catg->name }}</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>

                <div class="d-flex justify-center x-gap-15 items-center pt-60 lg:pt-40">
                    <div class="col-auto">
                        <button class="d-flex items-center text-24 arrow-left-hover js-prev">
                            <i class="icon icon-arrow-left"></i>
                        </button>
                    </div>
                    <div class="col-auto">
                        <div class="pagination -arrows js-pagination"></div>
                    </div>
                    <div class="col-auto">
                        <button class="d-flex items-center text-24 arrow-right-hover js-next">
                            <i class="icon icon-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="course-list-slider layout-pt-lg layout-pb-lg section-bg">
        <div class="section-bg__item bg-blue-6"></div>
        <div data-anim-wrap class="container">
            <div class="tabs -pills js-tabs">
                <div class="row y-gap-20 justify-between items-end">
                    <div class="col-auto">

                        <div class="sectionTitle ">

                            <h2 class="sectionTitle__title ">{!! $page->heading3 !!}</h2>
                        </div>

                    </div>


                </div>

                <div class="tabs__content pt-60 lg:pt-50 js-tabs-content">

                    <div class="tabs__pane -tab-item-1 is-active">
                        <div class="overflow-hidden js-section-slider" data-gap="15"
                            data-slider-cols="xl-4 lg-3 md-2 sm-2">
                            <div class="swiper-wrapper">
                                @php
                                    $pop_courses = json_decode($page->courses);
                                    $popular_courses = getPopularCourses($pop_courses);
                                @endphp

                                @foreach ($popular_courses as $pc)
                                    <div class="swiper-slide">
                                        <div data-anim-child="slide-up delay-1">
                                            <a href="{{ route('course-details', ['slug' => $pc->slug]) }}"
                                                class="coursesCard -type-1 ">
                                                <div class="relative">
                                                    <div class="coursesCard__image overflow-hidden rounded-8">
                                                        <img class="w-1/1" src="{{ $pc->getCourseImage() }}"
                                                            alt="image">
                                                        <div class="coursesCard__image_overlay rounded-8"></div>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-between py-10 px-10 absolute-full-center z-3">
                                                    </div>
                                                </div>
                                                <div class="h-100 pt-15 pb-15 pl-10 pr-10">
                                                    <div class="text-17 lh-15 fw-500 text-dark-1 mt-10">
                                                        {!! mb_strimwidth(strip_tags($pc->name), 0, 30, '...') !!}
                                                    </div>
                                                    <div class="d-grid c-grid-columns x-gap-10 items-center pt-10">
                                                        <div class="d-flex items-center">
                                                            <div class="mr-8">
                                                                <img src="{{ asset('assets/img/icons/duration.svg') }}"
                                                                    alt="icon">
                                                            </div>
                                                            <div class="text-14 lh-1">{!! $pc->duration ?? '' !!}</div>
                                                        </div>

                                                        <div class="d-flex items-center">
                                                            <div class="mr-8">
                                                                <img src="{{ asset('assets/img/icons/lang.svg') }}"
                                                                    alt="icon">
                                                            </div>
                                                            <div class="text-14 lh-1">{!! $pc->language->title ?? '' !!}</div>
                                                        </div>

                                                        <div class="d-flex items-center">
                                                            <div class="mr-8">
                                                                <img src="{{ asset('assets/img/icons/type.svg') }}"
                                                                    alt="icon">
                                                            </div>
                                                            <div class="text-14 lh-1">{!! $pc->course_type->title ?? '' !!}</div>
                                                        </div>

                                                        <div class="d-flex items-center">
                                                            <div class="mr-8">
                                                                <img src="{{ asset('assets/img/icons/location.svg') }}"
                                                                    alt="icon">
                                                            </div>
                                                            <div class="text-14 lh-1">{!! $pc->location->name ?? '' !!}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <button
                                class="section-slider-nav -prev -dark-bg-dark-2 -white -absolute size-70 rounded-full shadow-5 js-prev">
                                <i class="icon icon-arrow-left text-24"></i>
                            </button>

                            <button
                                class="section-slider-nav -next -dark-bg-dark-2 -white -absolute size-70 rounded-full shadow-5 js-next">
                                <i class="icon icon-arrow-right text-24"></i>
                            </button>

                        </div>
                    </div>



                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-lg layout-pb-lg js-mouse-move-container">
        <div class="container">
            <div class="row y-gap-30 ">
                <div class="col-lg-6 order-2 order-lg-1">
                    <h2 class="text-45 lg:text-40 md:text-30 text-dark-1">
                        {!! $page->heading4 !!}
                    </h2>
                    <p class="text-dark-1 mt-20">
                        {!! $page->content4 !!}
                    </p>

                    <div class="row y-gap-30 pt-40 lg:pt-40">

                        <div class="col-12">
                            <div class="featureIcon -type-1">
                                <div class="featureIcon__icon bg-orange-2 ">
                                    <img width="40" src="{{ $page->getImage6() }}" alt="icon">
                                </div>

                                <div class="featureIcon__content ml-30 md:ml-20">
                                    <h4 class="text-17 fw-500">{!! $page->heading7 !!}</h4>
                                    <p class="mt-5"> {!! $page->content7 !!}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="featureIcon -type-1">
                                <div class="featureIcon__icon bg-green-2">
                                    <img width="40" src="{{ $page->getImage7() }}" alt="icon">
                                </div>

                                <div class="featureIcon__content ml-30 md:ml-20">
                                    <h4 class="text-17 fw-500">{!! $page->heading8 !!}</h4>
                                    <p class="mt-5">{!! $page->content8 !!}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="featureIcon -type-1">
                                <div class="featureIcon__icon bg-purple-2">
                                    <img width="40" src="{{ $page->getImage8() }}" alt="icon">
                                </div>

                                <div class="featureIcon__content ml-30 md:ml-20">
                                    <h4 class="text-17 fw-500">{!! $page->heading9 !!}</h4>
                                    <p class="mt-5">{!! $page->content9 !!}</p>
                                </div>
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="featureIcon -type-1">
                                <div class="featureIcon__icon bg-yellow-5">
                                    <img width="40" src="{{ $page->getImage9() }}" alt="icon">
                                </div>

                                <div class="featureIcon__content ml-30 md:ml-20">
                                    <h4 class="text-17 fw-500">{!! $page->heading10 !!}</h4>
                                    <p class="mt-5">{!! $page->content10 !!}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="elements-image">
                        <div class="elements-image__img1">
                            <img class="js-mouse-move" data-move="40" src="{{ $page->getImage4() }}" alt="image">
                        </div>

                        <div class="elements-image__img2">
                            <img class="js-mouse-move" data-move="70" src="{{ $page->getImage5() }}" alt="image">
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="hom-vd layout-pt-lg layout-pb-lg mb-90 section-bg">
        <!-- <div class="section-bg__item bg-dark-1" style="background-image: url(img/Training-bg.jpg);"></div> -->

        <div class="video-container"
            style="position: absolute;width: 98%;left: 1%; right: 1%;top: 0;height: 100%;z-index: -1;border-radius: 20px; overflow: hidden;">
            <div class="vid-overlay"></div>
            <video class="m-auto w-100 h-100" loop="" muted="" autoplay poster="{{ $page->getImage10() }}"
                style="object-fit: cover;">
                <source src="{!! $page->video_link ?? '' !!}" type="video/mp4">
                <!-- <source src="movie.ogg" type="video/ogg"> -->
            </video>
        </div>



        <div class="container">
            <div class="row justify-center text-center">
                <div class="col-xl-5 col-lg-6 col-md-11">

                    <div class="sectionTitle -light">

                        <h2 class="sectionTitle__title ">{!! $page->heading5 ?? '' !!}</h2>

                        <p class="sectionTitle__text ">
                            {!! $page->content5 ?? '' !!}
                        </p>

                    </div>

                </div>
            </div>

            <div class="row mt-30 justify-center">
                <div class="col-lg-3">

                    <a data-barba="" href="{{ $page->button_link_2 ?? '#' }}"
                        class="button -md -outline-light-4 text-white">{!! $page->btn_text2 ?? '' !!}</a>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-md">
        <div class="container">
            <div class="row y-gap-20 justify-center text-center">
                <div class="col-auto">

                    <div class="sectionTitle ">

                        <h2 class="sectionTitle__title ">{!! $page->heading6 ?? '' !!}</h2>

                        <p class="sectionTitle__text ">
                            {!! $page->content6 ?? '' !!}
                        </p>

                    </div>

                </div>
            </div>

            @include('frontend.common.review')

        </div>
    </section>

    @include('frontend.common.proud_blue')
@endsection
