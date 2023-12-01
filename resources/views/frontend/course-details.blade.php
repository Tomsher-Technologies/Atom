@extends('layouts.app.sub')
@section('content')
    <section data-anim-wrap class="masthead -type-2">
        <div class="masthead__bg">
            <div class="bg-image js-lazy" data-bg="{{$course->getBannerImage()}}"></div>
        </div>

        <div class="container">
            <div class="row y-gap-50 justify-center items-center">
                <div class="col-xl-6 col-lg-11">
                    <div class="masthead__content">
                        <div data-anim-child="slide-up delay-2" class="masthead__subtitle fw-500 text-white text-20 lh-15">
                            <a href="{{ route('courses',['slug' => $course->training_category->slug]) }}">{!! $course->training_category->name ?? '' !!}</a>
                        </div>
                        <h1 data-anim-child="slide-up delay-3" class="masthead__title text-white mt-10">
                            {!! $course->banner_title ?? '' !!}
                        </h1>
                    </div>
                </div>

                <div class="col-xl-5 col-lg-11">

                    <div data-anim-child="slide-up delay-2" class="masthead__text text-20 text-white mt-25 lh-16">
                        {!! $course->banner_content !!}
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-xs layout-pb-md">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">


                    <div id="overview" class="pt-60 lg:pt-40 to-over">
                        <h4 class="text-18 fw-500">Description</h4>

                        <div class="show-more mt-30">
                            <div class="show-more__content">
                                <p class="">
                                    {!! $course->description !!}
                                </p>
                            </div>

                        </div>


                    </div>

                    <div id="course-content" class="pt-60 lg:pt-40">
                        {{-- <h2 class="text-20 fw-500">Course Content</h2> --}}



                        <div class="mt-10">
                            <div class="accordion -block-2 text-left js-accordion">

                                @php
                                    $contents = $course->course_details;
                                @endphp

                                @if ($contents)
                                    @foreach ($contents as $cont)
                                        <div class="accordion__item">
                                            <div class="accordion__button py-20 px-30 bg-light-4">
                                                <div class="d-flex items-center">
                                                    <div class="accordion__icon">
                                                        <div class="icon" data-feather="chevron-down"></div>
                                                        <div class="icon" data-feather="chevron-up"></div>
                                                    </div>
                                                    <span class="text-17 fw-500 text-dark-1">{{$cont->title}}</span>
                                                </div>
        
                                            </div>
        
                                            <div class="accordion__content">
                                                <div class="accordion__content__inner px-30 py-30">
                                                    <div class="y-gap-20">
        
                                                        <div class="d-flex justify-between">
                                                            <div class="d-flex items-center">
        
                                                                <div>{!! $cont->description !!}</div>
                                                            </div>
                                                        </div>
        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                               
                            </div>
                        </div>
                    </div>



                </div>


                <div class="col-12 mt-40">
                    <hr>
                    <br>
                    <button type="submit" name="submit" id="submit" class="button -md -purple-1 text-white">
                        Apply Now
                    </button>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.common.proud_blue')
@endsection
