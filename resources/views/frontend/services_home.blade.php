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
                                <a data-barba href="{{ $page->button_link_1 }}" class="button -md -gradient-1 text-white">{!! $page->btn_text1 ?? '' !!} </a>
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

    <section class="layout-pt-md layout-pb-md">
        <div class="container">
            <div class="row justify-center text-center">
                <div class="col-auto">
                    <div class="sectionTitle ">
                        <h2 class="sectionTitle__title ">{!! $page->heading1 !!}</h2>
                        <p class="sectionTitle__text ">
                            {!! $page->content1 !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row y-gap-30 pt-50">
                @if ($services)
                    @foreach($services as $service)
                        <div class="col-lg-3 col-md-6">
                            <div class="row y-gap-30">
                                <div class="col-12">
                                    <div class="categoryCard -type-1">
                                        <a href="{{ route('service-details',['slug' => $service->slug]) }}">
                                            <div class="categoryCard__image">
                                                <div class="bg-image ratio ratio-9:16 js-lazy" data-bg="{{$service->getListingImage()}}"></div>
                                            </div>
                                            <div class="categoryCard__content text-center">
                                                <h4 class="categoryCard__title text-17 lh-15 fw-500 text-white">
                                                    {{$service->name}}
                                                </h4>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                
            </div>
        </div>
    </section>

    <section class="common-margin common-radius section-bg layout-pt-md layout-pb-sm">
        <div class="section-bg__item -full -height-half section-bg-img-01"></div>
        <div data-anim-wrap class="container">
            <div class="row justify-center text-center">
                <div class="col-auto">
                    <div class="sectionTitle ">
                        <h2 class="sectionTitle__title text-white">{!! $page->heading4 !!}</h2>
                        <p class="sectionTitle__text text-white">
                            {!! $page->content4 !!}
                        </p>
                    </div>
                </div>
            </div>
            <div data-anim-wrap class="row y-gap-30 justify-between pt-60 lg:pt-50">
                <div data-anim-child="slide-up delay-1" class="col-lg-3 col-md-6">
                    <div class="coursesCard -type-2 text-center pt-50 pb-40 px-30 rounded-8 bg-white shadow-2">
                        <div class="coursesCard__image">
                            <img src="{{ $page->getImage6() }}" alt="image">
                        </div>
                        <div class="coursesCard__content mt-30">
                            <h5 class="coursesCard__title text-18 lh-1 fw-500">{!! $page->heading7 !!}</h5>
                            <p class="coursesCard__text text-14 mt-10">
                                {!! $page->content7 !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div data-anim-child="slide-up delay-2" class="col-lg-3 col-md-6">
                    <div class="coursesCard -type-2 text-center pt-50 pb-40 px-30 rounded-8 bg-white shadow-2">
                        <div class="coursesCard__image">
                            <img src="{{ $page->getImage7() }}" alt="image">
                        </div>
                        <div class="coursesCard__content mt-30">
                            <h5 class="coursesCard__title text-18 lh-1 fw-500">{!! $page->heading8 !!}</h5>
                            <p class="coursesCard__text text-14 mt-10">
                                {!! $page->content8 !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div data-anim-child="slide-up delay-3" class="col-lg-3 col-md-6">
                    <div class="coursesCard -type-2 text-center pt-50 pb-40 px-30 rounded-8 bg-white shadow-2">
                        <div class="coursesCard__image">
                            <img src="{{ $page->getImage8() }}" alt="image">
                        </div>
                        <div class="coursesCard__content mt-30">
                            <h5 class="coursesCard__title text-18 lh-1 fw-500">{!! $page->heading9 !!}</h5>
                            <p class="coursesCard__text text-14 mt-10">
                                {!! $page->content9 !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div data-anim-child="slide-up delay-4" class="col-lg-3 col-md-6">
                    <div class="coursesCard -type-2 text-center pt-50 pb-40 px-30 rounded-8 bg-white shadow-2">
                        <div class="coursesCard__image">
                            <img src="{{ $page->getImage9() }}" alt="image">
                        </div>
                        <div class="coursesCard__content mt-30">
                            <h5 class="coursesCard__title text-18 lh-1 fw-500">{!! $page->heading10 !!}</h5>
                            <p class="coursesCard__text text-14 mt-10">
                                {!! $page->content10 !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-sm layout-pb-md">
        <div class="container">
            <div class="row y-gap-20 justify-center text-center">
                <div class="col-auto">
                    <div class="sectionTitle ">
                        <h2 class="sectionTitle__title ">{!! $page->heading2 !!}</h2>
                        <p class="sectionTitle__text ">
                            {!! $page->content2 !!}
                        </p>
                    </div>
                </div>
            </div>
            <div data-anim-wrap class="pt-60 lg:pt-50">
                <div class="overflow-hidden js-section-slider" data-gap="30" data-loop data-pagination
                    data-slider-cols="xl-6 lg-4 md-3 sm-2">
                    <div class="swiper-wrapper">
                        @php
                            $clients = getClients();
                        @endphp
                        @if($clients)
                            @foreach ($clients as $cl)
                                <div class="swiper-slide h-100">
                                    <div data-anim-child="slide-left delay-1" class="infoCard -type-1">
                                        <div class="infoCard__image">
                                            <img class="h-100" src="{{ $cl->getImage() }}" alt="image">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="d-flex justify-center x-gap-15 items-center pt-60 lg:pt-40">
                        <div class="col-auto">
                            <div class="pagination -arrows js-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="hom-vd layout-pt-sm layout-pb-md section-bg">
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
                        <h2 class="sectionTitle__title ">{!! $page->heading5 ?? '' !!}</h2>
                        <p class="sectionTitle__text ">
                            {!! $page->content5 ?? '' !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mt-30 justify-center">
                <div class="col-lg-3">
                    <a data-barba="" href="{{ $page->button_link_2 ?? '#' }}" class="button -md -outline-light-4 text-white">{!! $page->btn_text2 ?? '' !!}</a>
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
    
    <style>
    .header.-type-1 {
            background-color: transparent !important;
    }
</style>

    @include('frontend.common.proud_blue')

@endsection
