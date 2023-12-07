@extends('layouts.app.sub')
@section('content')
    <section data-anim-wrap class="masthead -type-2">
        <div class="masthead__bg">
            <div class="bg-image js-lazy" data-bg="{{$service->getBannerImage()}}"></div>
        </div>

        <div class="container">
            <div class="row y-gap-50 justify-center items-center">
                <div class="col-xl-6 col-lg-11">
                    <div class="masthead__content">
                        <div data-anim-child="slide-up delay-2" class="masthead__subtitle fw-500 text-white text-20 lh-15">
                           Services
                        </div>
                        <h1 data-anim-child="slide-up delay-3" class="masthead__title text-white mt-10">
                            {!! $service->name !!}
                        </h1>
                    </div>
                </div>

                <div class="col-xl-5 col-lg-11">

                    <div data-anim-child="slide-up delay-2" class="masthead__text text-20 text-white lh-16">
                        {!! $service->banner_content !!}
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-md">
        <div class="container">
            <div class="row y-gap-30 items-center">
                <div class="col-xl-12 col-lg-12">
                    <h3 class="text-24 lh-1">{!! $service->title !!}</h3>
                    {!! $service->description !!}

                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-md">
        <div class="container">
            <div class="row y-gap-30 items-center">
                <div class="col-xl-5 offset-xl-1 col-lg-6">
                    <img class="w-1/1" src="{{ $service->getImage1() }}" alt="image">
                </div>

                <div class="col-xl-4 offset-xl-1 col-lg-6">
                    <h3 class="text-24 lh-1">{!! $service->heading1 !!}</h3>
                    <p class="mt-20">
                        {!! $service->content1 !!}
                    </p>

                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-md">
        <div class="container">
            <div class="row y-gap-30 items-center">
                <div class="col-xl-4 offset-xl-1 order-lg-1 col-lg-6 order-2">
                    <h3 class="text-24 lh-1">{!! $service->heading2 !!}</h3>
                    <p class="mt-20">
                        {!! $service->content2 !!}
                    </p>

                </div>

                <div class="col-xl-5 offset-xl-1 col-lg-6 order-lg-2 order-1">
                    <img class="w-1/1" src="{{ $service->getImage2() }}" alt="image">
                </div>
            </div>
        </div>
    </section>

    @include('frontend.common.proud_blue')
@endsection
