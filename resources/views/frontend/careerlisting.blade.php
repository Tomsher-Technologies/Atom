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

                    <p data-anim-child="slide-up delay-2" class="masthead__text text-20 text-white  lh-16">
                        {!! $page->description ?? '' !!}
                    </p>

                </div>
            </div>
        </div>
    </section>

    <section class="course-list-slider layout-pt-md layout-pb-lg">
        <div data-anim-wrap class="container">
            <div class="row y-gap-30">

                @if ($careers)
                    @foreach($careers as $item)
                        <div data-anim-child="slide-up delay-1" class="col-lg-4 col-md-6">
                                <div class="h-100 pt-15 pb-15 pl-10 pr-10">
                                    <div class="text-17 lh-15 fw-500 text-dark-1 mt-10">{!! $item->title ?? '' !!}</div>
                                    <div class="d-grid x-gap-10 items-center pt-10">
                                        <div class="">Position: {!! $item->position ?? '' !!}</div>
                                        <div class="">Details: {!! $item->description ?? '' !!}</div>
                                        <div class="">Last Date: {!! $item->last_date ?? '' !!}</div>
                                    </div>
                                </div>
                        </div>
                    @endforeach    
                @endif
                

            </div>
            
            <div class="row justify-center pt-50 lg:pt-50">
                <div class="col-auto">
                    <div id="pg-custom">
                    <div class="pagination">
                        {{ $careers->appends(request()->input())->links('pagination::bootstrap-5') }}
                    </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    @include('frontend.common.proud_blue')
@endsection
