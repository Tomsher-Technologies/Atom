@extends('layouts.app.sub')
@section('content')
    <section data-anim-wrap class="masthead -type-2">
        <div class="masthead__bg">
            <div class="bg-image js-lazy" data-bg="{{ $category[0]->getImage() }}"></div>
        </div>

        <div class="container">
            <div class="row y-gap-50 justify-center items-center">
                <div class="col-xl-6 col-lg-11">
                    <div class="masthead__content">
                        
                        <h1 data-anim-child="slide-up delay-2" class="masthead__title text-white mt-10">
                            {!! $category[0]->name ?? '' !!}
                        </h1>
                    </div>
                </div>

                <div class="col-xl-5 col-lg-11">

                    <div data-anim-child="slide-up delay-2" class="masthead__text text-20 text-white lh-16">
                        {!! $category[0]->description ?? '' !!}
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="course-list-slider layout-pt-md layout-pb-lg">
        <div data-anim-wrap class="container">
            <div class="row y-gap-30">

                @if ($courses)
                    @foreach($courses as $item)
                        <div data-anim-child="slide-up delay-1" class="col-lg-4 col-md-6">
                            <a href="{{ route('course-details',['slug' => $item->slug]) }}" class="coursesCard -type-1 rounded-8 bg-white shadow-3">
                                <div class="relative">
                                    <div class="coursesCard__image overflow-hidden rounded-8">
                                        <img class="w-1/1" src="{{ $item->getCourseImage() }}" alt="image">
                                        <div class="coursesCard__image_overlay rounded-8"></div>
                                    </div>
                                    <div class="d-flex justify-between py-10 px-10 absolute-full-center z-3 ">
        
                                    </div>
                                </div>
        
                                <div class="h-100 pt-15 pb-15 pl-10 pr-10">
                                    <div class="text-17 lh-15 fw-500 text-dark-1 mt-10">{!! $item->name ?? '' !!}</div>
                                    <div class="d-grid c-grid-columns x-gap-10 items-center pt-10">
                                        <div class="d-flex items-center">
                                            <div class="mr-8">
                                                <img src="{{ asset('assets/img/icons/duration.svg') }}" alt="icon">
                                            </div>
                                            <div class="text-14 lh-1">{!! $item->duration ?? '' !!}</div>
                                        </div>
        
                                        <div class="d-flex items-center">
                                            <div class="mr-8">
                                                <img src="{{ asset('assets/img/icons/lang.svg') }}" alt="icon">
                                            </div>
                                            <div class="text-14 lh-1 white-space-nowrap">{!! $item->language->title ?? '' !!}</div>
                                        </div>
        
                                        <div class="d-flex items-center">
                                            <div class="mr-8">
                                                <img src="{{ asset('assets/img/icons/type.svg') }}" alt="icon">
                                            </div>
                                            <div class="text-14 lh-1 white-space-nowrap">{!! $item->course_type->title ?? '' !!}</div>
                                        </div>
        
                                        <div class="d-flex items-center">
                                            <div class="mr-8">
                                                <img src="{{ asset('assets/img/icons/location.svg') }}" alt="icon">
                                            </div>
                                            <div class="text-14 lh-1">{!! $item->location->name ?? '' !!}</div>
                                        </div>
                                    </div>
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
                        {{ $courses->appends(request()->input())->links('pagination::bootstrap-5') }}
                    </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    @include('frontend.common.proud_blue')
@endsection
