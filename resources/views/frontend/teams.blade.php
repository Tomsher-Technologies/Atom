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

                    <p data-anim-child="slide-up delay-2" class="masthead__text text-20 text-white  lh-16">
                        {!! $page->description ?? '' !!}
                    </p>

                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
        <div data-anim-wrap class="container">
            <div class="row justify-center">
                <div class="col text-center">
                    <p class="text-lg text-dark-1">{!! $page->heading1 ?? '' !!}</p>
                </div>
            </div>

            <div class="row y-gap-30 justify-between sm:justify-start items-center pt-60 md:pt-50">
                @if($teams)
                    @foreach ($teams as $cl)
                        <div data-anim-child="slide-up delay-1" class="col-lg-4 col-md-4 col-sm-4 col-4">
                            <div class="d-flex justify-center items-center px-4">
                                <img class="w-1/1" src="{{ $cl->getImage() }}" alt="teams image">
                            </div>
                            <div class="col text-center">
                                <p class="text-lg text-dark-1">{!! $cl->name ?? '' !!}</p>
                            </div>
                            <div class="col text-center">
                                <p class="text-lg text-dark-1">{!! $cl->designation ?? '' !!}</p>
                            </div>
                            <div class="col text-center">
                                <p class="text-lg text-dark-1">{!! $cl->description ?? '' !!}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
                
            </div>
        </div>
    </section>

    @include('frontend.common.proud_blue')
@endsection
