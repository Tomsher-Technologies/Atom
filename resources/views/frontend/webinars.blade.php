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
                            {!! $page->title ?? '' !!}
                        </div>
                        <h1 data-anim-child="slide-up delay-3" class="masthead__title text-white mt-10">
                            {!! $page->sub_title ?? '' !!}
                        </h1>




                    </div>
                </div>

                <div class="col-xl-5 col-lg-11">

                    <div data-anim-child="slide-up delay-2" class="masthead__text text-20 text-white lh-16">
                        {!! $page->description ?? '' !!}
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-sm">
        <div data-anim-wrap class="container">
            <div class="row justify-center text-center">
                <div class="col-auto">

                    <div class="sectionTitle ">

                        <h2 class="sectionTitle__title "> {!! $page->heading1 ?? '' !!}</h2>

                        <p class="sectionTitle__text "> {!! $page->content1 ?? '' !!}</p>

                    </div>

                </div>
            </div>

            <div class="pt-60 lg:pt-50 js-section-slider" data-gap="30" data-pagination data-slider-cols="xl-3 lg-3 md-2">
                <div class="swiper-wrapper">
                    @if ($upcoming)
                        @foreach ($upcoming as $up)
                            <div class="swiper-slide">
                                <div class="eventCard -type-3 bg-light-4 rounded-8">
                                    <div class="eventCard__date">
                                    
                                        <span class="text-45 lh-1 fw-700 text-dark-1">{{ date('d', strtotime($up->webinar_date)) }}</span>
                                        <span class="text-18 lh-1 fw-500 ml-15">{{ date('M', strtotime($up->webinar_date)) }},</span>
                                        <span class="text-18 lh-1 fw-500 ml-5">{{ date('Y', strtotime($up->webinar_date)) }}</span>
                                    </div>
        
                                    <h4 class="eventCard__title text-24 lh-15 fw-500">
                                        {!! $up->title ?? '' !!}
                                    </h4>
        
                                    <div class="eventCard__button">
        
                                        <a href="{{ route('webinar-details',['slug' => $up->slug]) }}" class="button -icon -purple-1 text-white">
                                            READMORE
                                            <i class="icon-arrow-top-right text-13 ml-10"></i>
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

    <section class="layout-pt-md layout-pb-lg border-top-light">
        <div data-anim-wrap class="container">
            <div class="row justify-center text-center">
                <div class="col-auto">

                    <div class="sectionTitle ">

                        <h2 class="sectionTitle__title ">{!! $page->heading2 ?? '' !!}</h2>

                        <p class="sectionTitle__text ">
                            {!! $page->content2 ?? '' !!}
                        </p>

                    </div>

                </div>
            </div>

            <div class="pt-60 lg:pt-50 js-section-slider" data-gap="30" data-pagination
                data-slider-cols="xl-3 lg-3 md-2">
                <div class="swiper-wrapper">
                    @if ($completed)
                        @foreach ($completed as $comp)
                            <div class="swiper-slide">
                                <div class="eventCard -type-3 bg-light-4 rounded-8">
                                    <div class="eventCard__date">
                                        <span class="text-45 lh-1 fw-700 text-dark-1">{{ date('d', strtotime($comp->webinar_date)) }}</span>
                                        <span class="text-18 lh-1 fw-500 ml-15">{{ date('M', strtotime($comp->webinar_date)) }},</span>
                                        <span class="text-18 lh-1 fw-500 ml-5">{{ date('Y', strtotime($comp->webinar_date)) }}</span>
                                    </div>

                                    <h4 class="eventCard__title text-24 lh-15 fw-500">
                                        {!! $comp->title ?? '' !!}
                                    </h4>

                                    <div class="eventCard__button">

                                        <a href="{{ route('webinar-details',['slug' => $comp->slug]) }}" class="button -icon -purple-1 text-white">
                                            READMORE
                                            <i class="icon-arrow-top-right text-13 ml-10"></i>
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

    @include('frontend.common.proud_blue')
@endsection
