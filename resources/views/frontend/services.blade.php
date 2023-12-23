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

    <section class="layout-pt-md layout-pb-lg">
        <div class="container">

            <div data-anim-wrap class="row y-gap-30 pt-50">
                @if ($services)
                    @foreach($services as $service)
                        <div class="col-xl-3 col-md-6" data-anim-child="scale delay-1">
                            <a href="{{ route('service-details',['slug' => $service->slug]) }}" class="categoryCard -type-4">
                                <div class="categoryCard__icon" style="background-image: url({{$service->getListingImage()}});background-size: cover;">
                                </div>
                                <div class="categoryCard__content mt-10">
                                    <h4 class="categoryCard__title text-17 fw-500">{{$service->name}}</h4>
                                    {{-- <div class="categoryCard__text text-13 text-light-1 lh-1 mt-5">10 Courses</div> --}}
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
                
            </div>

            
            <div class="row justify-center pt-50 lg:pt-50">
                <div class="col-auto">
                    <div id="pg-custom">
                    <div class="pagination">
                        {{ $services->appends(request()->input())->links('pagination::bootstrap-5') }}
                    </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    @include('frontend.common.proud_blue')
@endsection
