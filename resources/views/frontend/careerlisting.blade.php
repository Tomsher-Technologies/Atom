@extends('layouts.app.sub')
@section('content')

<div class="content-wrapper  js-content-wrapper">




<section data-anim-wrap class="masthead -type-2">
    <div class="masthead__bg">
        <div class="bg-image js-lazy" data-bg="{{ $page->getImage1() }}"></div>
    </div>

    <div class="container">
        <div class="row y-gap-50 justify-center items-center">
            <div class="col-xl-6 col-lg-11">
                <div class="masthead__content">
                    <div data-anim-child="slide-up delay-2"
                        class="masthead__subtitle fw-500 text-white text-20 lh-15">
                        {{ $page->title ?? '' }}
                    </div>
                    <h1 data-anim-child="slide-up delay-3" class="masthead__title text-white mt-10">
                    {{ $page->sub_title ?? '' }}
                    </h1>




                </div>
            </div>

            <div class="col-xl-5 col-lg-11">

                <p data-anim-child="slide-up delay-2" class="masthead__text text-20 text-white mt-25 lh-16">
                {!! $page->description ?? '' !!}
                </p>

            </div>
        </div>
    </div>
</section>

<section class="layout-pt-md layout-pb-lg">
    <div data-anim-wrap class="container">

        <div class="open-positions-accordion">


        @if ($careers)
                    @foreach($careers as $item)


            <div class="open-positions-item">
                <div class="open-positions-header">
                    <div class="position-header-section">
                        <p class="position-title">{!! $item->position ?? '' !!}</p>
                        <!-- <a class="apply-position" href="">Apply Now</a> -->
                    </div>
                    <i class="toggle-icon icon-chevron-right text-13 ml-10"></i>
                </div>
                <div class="open-positions-content">
                    <div class="position-detail">
                        <p>{!! $item->description ?? '' !!}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach    
                @endif
        </div>


    </div>

</section>

    @include('frontend.common.proud_blue')
@endsection
