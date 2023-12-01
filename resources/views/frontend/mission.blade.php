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

                    <p data-anim-child="slide-up delay-2" class="masthead__text text-20 text-white mt-25 lh-16">

                    </p>

                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-md">
        <div class="container">
            <div class="row y-gap-30 items-center">
                <div class="col-xl-5 offset-xl-1 col-lg-6">
                    <img class="w-1/1" src="{{ $page->getImage2() }}" alt="image">
                </div>

                <div class="col-xl-4 offset-xl-1 col-lg-6">
                    <h3 class="text-24 lh-1">{!! $page->heading1 ?? '' !!}</h3>
                    <p class="mt-20">
                        {!! $page->content1 ?? '' !!}
                    </p>

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
                <source src="{!! $page->video_link ?? '' !!}" type="video/mp4">
                <!-- <source src="movie.ogg" type="video/ogg"> -->
            </video>
        </div>

        <div class="container">
            <div class="row justify-center text-center">
                <div class="col-xl-5 col-lg-6 col-md-11">

                    <div class="sectionTitle -light">

                        <h2 class="sectionTitle__title ">{!! $page->heading2 ?? '' !!}</h2>

                        <p class="sectionTitle__text ">{!! $page->heading3 ?? '' !!}</p>

                    </div>

                </div>
            </div>

            <div class="row mt-30 justify-center">
                <div class="col-lg-3">

                    <a data-barba="" href="{{ $page->button_link_1 }}" class="button -md -outline-light-4 text-white">{!! $page->btn_text1 ?? '' !!}</a>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-md">
        <div class="container">
            <div class="row y-gap-30 items-center">
                <div class="col-xl-4 offset-xl-1 order-lg-1 col-lg-6 order-2">
                    <h3 class="text-24 lh-1">{!! $page->heading4 ?? '' !!}</h3>
                    <p class="mt-20">
                        {!! $page->content4 ?? '' !!}
                    </p>

                </div>

                <div class="col-xl-5 offset-xl-1 col-lg-6 order-lg-2 order-1">
                    <img class="w-1/1" src="{{ $page->getImage3() }}" alt="image">
                </div>
            </div>
        </div>
    </section>

    @include('frontend.common.proud_blue')
@endsection
