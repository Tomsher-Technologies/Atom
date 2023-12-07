@extends('layouts.app.sub')
@section('content')
    <section data-anim-wrap class="masthead -type-2">
        <div class="masthead__bg">
            <div class="bg-image js-lazy" data-bg="{{ $page->getImage1() }}"></div>
        </div>
        <div class="container">
            <div class="row y-gap-50 justify-center items-center">
                <div class="col-xl-6 col-lg-11">
                    <div class="masthead__content">
                        <div data-anim-child="slide-up delay-2" class="masthead__subtitle fw-500 text-white text-20 lh-15">
                            {{ $page->title ?? '' }}
                        </div>
                        <h1 data-anim-child="slide-up delay-3" class="masthead__title text-white mt-10">
                            {!! $page->sub_title ?? '' !!}
                        </h1>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-11">
                    <p data-anim-child="slide-up delay-2" class="masthead__text text-20 text-white lh-16">
                        {!! $page->description ?? '' !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="layout-pt-lg layout-pb-lg js-mouse-move-container">
        <div class="container">
            <div class="row y-gap-30 justify-between items-center">
                <div class="col-lg-6 order-2 order-lg-1">
                    <h2 class="text-45 lg:text-40 md:text-30 text-dark-1">{!! $page->heading1 ?? '' !!}</h2>
                    <p class="text-dark-1 mt-20">
                        {!! $page->content1 ?? '' !!}
                    </p>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="elements-image">
                        <div class="elements-image__img1">
                            <img class="js-mouse-move" data-move="40" src="{{ $page->getImage2() }}" alt="image">
                        </div>
                        <div class="elements-image__img2">
                            <img class="js-mouse-move" data-move="70" src="{{ $page->getImage3() }}" alt="image">
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
            <video class="m-auto w-100 h-100" loop="" muted="" autoplay poster="{{ $page->getImage4() }}"
                style="object-fit: cover;">
                <source src="{!! asset($page->video_link ?? '') !!}" type="video/mp4">
                <!-- <source src="movie.ogg" type="video/ogg"> -->
            </video>
        </div>
        <div class="container">
            <div class="row justify-center text-center">
                <div class="col-xl-5 col-lg-6 col-md-11">
                    <div class="sectionTitle -light">
                        <h2 class="sectionTitle__title ">
                            {!! $page->heading2 ?? '' !!}
                        </h2>
                        <p class="sectionTitle__text ">
                            {!! $page->heading3 ?? '' !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mt-30 justify-center">
                <div class="col-lg-3">
                    <a data-barba="" href="{{ $page->button_link_1 ?? '#' }}" class="button -md -outline-light-4 text-white">{!! $page->btn_text1 ?? '' !!}</a>
                </div>
            </div>
        </div>
    </section>
    <section class="layout-pt-md layout-pb-md" style="background-image: url(img/bg-50.jpg); background-size: cover;">
        <div class="container">
            <div class="row y-gap-30 justify-between items-center">
                <div class="col-xl-5 col-lg-6 col-md-9 lg:order-2">
                    <h3 class="text-45 md:text-30 lh-12">
                        {!! $page->heading4 ?? '' !!}
                    </h3>
                    <p class="mt-20">
                        {!! $page->content4 ?? '' !!}
                    </p>
                    <div class="d-inline-block mt-30">
                        <a href="{{ $page->button_link_2 ?? '#' }}" class="button -md -dark-1 text-white">{!! $page->btn_text2 ?? '' !!}</a>
                    </div>
                </div>
                <!-- <div class="col-lg-6 lg:order-1">
            <div class="-el-2">
                <img class="w-1/1" src="img/excellence.jpg" alt="image">
              </div>
            </div> -->
                <div class="col-lg-6 lg:order-1">
                    <div class="composition -type-3">
                        <div class="-el-1">
                            <div class="bg-dark-1 py-50 px-30 rounded-8">
                                <div class="y-gap-20">
                                    @php
                                        $points = json_decode($page->courses);
                                    @endphp

                                    @if($points)
                                        @foreach ($points as $point)
                                            <div class="d-flex items-center">
                                                <div class="d-flex items-center justify-center size-25 rounded-full bg-purple-1 mr-15">
                                                    <i class="text-white size-12" data-feather="check"></i>
                                                </div>
                                                <div class="fw-500 text-white">{{ $point->title }}</div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="-el-2">
                            <img class="w-1/1" src="{{ asset('assets/img/excellence.jpg') }}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.common.proud_blue')
    
@endsection
