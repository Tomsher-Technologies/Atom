@extends('layouts.app.main')
@section('content')
    <section data-anim-wrap class="mainSlider -type-1 js-mainSlider">
        <div class="swiper-wrapper">
            @php
                $sliders = getHomeSliders();
            @endphp

            @foreach ($sliders as $sl)
                <div class="swiper-slide">
                    <div data-anim-child="fade" class="mainSlider__bg">
                        <div class="bg-image js-lazy" data-bg="{{ $sl->getImage() }}"></div>
                    </div>
                </div>
            @endforeach


        </div>

        <div class="container">
            <div class="row justify-center text-center">
                <div class="col-xl-10 col-lg-12">
                    <div class="mainSlider__content">
                        <h1 data-anim-child="slide-up delay-3" class="mainSlider__title text-white">
                            {!! $page->heading7 ?? '' !!}
                        </h1>

                        <p data-anim-child="slide-up delay-4" class="mainSlider__text text-white">
                            {!! $page->heading8 ?? '' !!}
                        </p>

                        <div data-anim-child="slide-up delay-5" class="mainSlider__form">
                            <form method="GET" action="{{ route('search-course') }}">
                                <input type="text" placeholder="{{ $page->heading3 ?? '' }}" name="keyword">

                                <button type="submit" class="button -md text-white">
                                    <i class="icon icon-search"></i>
                                </button>
                            </form>
                        </div>

                        <p class="pop-search" data-anim-child="slide-up delay-4" class="mainSlider__text text-white">
                            <a href="{{ route('training-courses') }}" class="text-white" data-el-toggle=".js-search-toggle"> <u>
                                    {{ $page->content3 ?? '' }}</u>
                            </a>

                            <!-- <button class="d-flex items-center text-white" >
                    <i class="text-20 icon icon-search"></i>
                    </button> -->

                        </p>

                    </div>
                </div>
            </div>

            <div data-anim-child="slide-up delay-6" class="row y-gap-20 justify-center mainSlider__items">

                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="mainSlider-item text-center">
                        <img src="{{ $page->getImage3() }}" alt="icon">
                        <h4 class="text-20 fw-500 lh-18 text-white mt-8">{{ $page->heading4 ?? '' }}</h4>

                    </div>
                </div>

                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="mainSlider-item text-center">
                        <img src="{{ $page->getImage4() }}" alt="icon">
                        <h4 class="text-20 fw-500 lh-18 text-white mt-8">{{ $page->heading5 ?? '' }}</h4>

                    </div>
                </div>

                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="mainSlider-item text-center">
                        <img src="{{ $page->getImage5() }}" alt="icon">
                        <h4 class="text-20 fw-500 lh-18 text-white mt-8">{{ $page->heading6 ?? '' }}</h4>

                    </div>
                </div>

            </div>
        </div>

        <button class="swiper-prev button -white-20 text-white size-60 rounded-full d-flex justify-center items-center js-prev">
            <i class="icon icon-arrow-left text-24"></i>
        </button>

        <button class="swiper-next button -white-20 text-white size-60 rounded-full d-flex justify-center items-center js-next">
            <i class="icon icon-arrow-right text-24"></i>
        </button>
    </section>

    <section class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <section class="course-list-slider layout-pt-xs bg-dark-2 h-100 rounded-30"
                    style="background-image: url({{ asset('assets/img/bg-24.jpg') }}); background-size: cover;">
                    <div data-anim-wrap class="container">
                        <div class="row y-gap-10 items-center">
                            <div class="col-lg-12 col-md-12">
                                <h2 class="text-30 lh-15 text-white">{!! $page->title ?? '' !!}</h2>
                                <p class="text-white pt-10 pb-10">{!! $page->sub_title ?? '' !!}</p>
                            </div>

                            <div class="col-lg-12">
                                <div class="h-100 pb-30">
                                    <div class="overflow-hidden js-section-slider" data-gap="15"
                                        data-slider-cols="xl-1 lg-1 md-1 sm-1">
                                        <div class="swiper-wrapper">

                                            @php
                                                $pop_courses = json_decode($page->courses);
                                                $popular_courses = getPopularCourses($pop_courses);
                                            @endphp

                                            @foreach ($popular_courses as $pc)
                                                <div class="swiper-slide">
                                                    <div data-anim-child="slide-up delay-1">
                                                        <a href="{{ route('course-details',['slug' => $pc->slug]) }}" class="coursesCard -type-1 ">
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
                                                                    {!! mb_strimwidth(strip_tags($pc->name), 0, 45, '...') !!}
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <section class="section-bg pt-30 pb-30 lg:pt-10 lg:pb-10 mb-10">
                            <div class="section-bg__item bg-dark-1"
                                style="background-image: url({{ $page->getImage1() }});  background-position: right; background-repeat: no-repeat; background-size: cover;">
                            </div>

                            <div class="container">
                                <div class="row y-gap-30 justify-between items-center">
                                    <div class="col-xl-5 col-lg-6 col-md-10">
                                        <div class="pl-10 lg:pl-0">
                                            <h2 class="text-30 lh-12 uppercase text-white">{!! $page->heading1 ?? '' !!}</h2>
                                            <p class="mt-30 text-20 text-white">
                                                {!! $page->content1 ?? '' !!}
                                            </p>
                                            <div class="app-content__buttons mt-30">
                                                <a href="{{ route('training-courses') }}" class="button -sm -outline-white -rounded text-white">{!! $page->btn_text1 ?? '' !!}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <!-- <img src="img/2x.gif" alt="image"> -->
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>

                    <div class="col-md-12">
                        <section class="section-bg pt-30 pb-30 lg:pt-10 lg:pb-10 mb-10">
                            <div class="section-bg__item bg-light-7"
                                style="background-image: url({{  $page->getImage2()  }}); background-position: right; background-repeat: no-repeat; background-size: cover;">
                            </div>
                            <div class="container">
                                <div class="row y-gap-30 justify-between items-center">
                                    <div class="col-xl-5 col-lg-6 col-md-10">
                                        <div class="pl-10 lg:pl-0">
                                            <h2 class="text-30 lh-12 uppercase text-white">{!! $page->heading2 ?? '' !!}</h2>
                                            <p class="mt-30 text-20 text-white">
                                                {!! $page->content2 ?? '' !!}
                                            </p>
                                            <div class="app-content__buttons mt-30">
                                                <a href="{{ route('consultancy-services') }}" class="button -sm -outline-white -rounded text-white">{!! $page->btn_text2 ?? '' !!}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">

                                        <!-- <img src="img/d.svg" alt="image"> -->
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
