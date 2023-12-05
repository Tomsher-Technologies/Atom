@extends('layouts.app.sub')
@section('content')
    <section class="page-header -type-1">
        <div class="container pt-50">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1">
                            
                            <h1 class="page-header__title lh-14">
                                {!! $blog->title !!}
                            </h1>


                            <p class="page-header__text">{{ date('M d, Y', strtotime($blog->blog_date)) }}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md">
        <div class="container">
            <div class="ratio ratio-16:9 rounded-8 bg-image js-lazy" data-bg="{{$blog->getImage1()}}"></div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="blogSection">
                <div class="blogCard">
                    <div class="row justify-center">
                        <div class="col-xl-8 col-lg-9 col-md-11">
                            <div class="blogCard__content">
                                {!! $blog->description1 !!}
                            </div>

                            <div class="row y-gap-30 pt-30">
                                <div class="col-sm-12">
                                    <img src="{{$blog->getImage2()}}" alt="image" class="w-1/1 initial-img rounded-8">
                                </div>
                            </div>

                            <div class="blogCard__content pt-30">
                                {!! $blog->description2 !!}
                            </div>
                        </div>
                    </div>
                </div>




                <div class="row justify-center">
                    <div class="col-xl-8 col-lg-9 col-md-11">
                        <div class="border-bottom-light py-30">
                            <div class="row x-gap-50 justify-between items-center">
                                @if ($previous_post)
                                    <div class="col-md-4 col-6">
                                        <a href="{{ route('blog-details',['slug' => $previous_post->slug]) }}" class="related-nav__item -prev decoration-none">
                                            <div class="related-nav__arrow">
                                                <i class="icon size-20 pt-5" data-feather="arrow-left"></i>
                                            </div>
                                            <div class="related-nav__content">
                                                <div class="text-17 text-dark-1 fw-500">Prev</div>
                                                <p class="text-dark-1 mt-8"> {!! mb_strimwidth(strip_tags($previous_post->title), 0, 60, '...') !!}</p>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                                <div class="col-auto lg:d-none">
                                    <div class="related-nav__icon row">

                                        <div class="col-4">
                                            <span></span>
                                        </div>

                                        <div class="col-4">
                                            <span></span>
                                        </div>

                                        <div class="col-4">
                                            <span></span>
                                        </div>

                                        <div class="col-4">
                                            <span></span>
                                        </div>

                                        <div class="col-4">
                                            <span></span>
                                        </div>

                                        <div class="col-4">
                                            <span></span>
                                        </div>

                                        <div class="col-4">
                                            <span></span>
                                        </div>

                                        <div class="col-4">
                                            <span></span>
                                        </div>

                                        <div class="col-4">
                                            <span></span>
                                        </div>

                                    </div>
                                </div>
                                @if ($next_post)
                                    <div class="col-md-4 col-6 d-flex justify-end">
                                        <a href="{{ route('blog-details',['slug' => $next_post->slug]) }}" class="related-nav__item -next text-right decoration-none">
                                            <div class="related-nav__content">
                                                <div class="text-17 text-dark-1 fw-500">Next</div>
                                                <p class="text-dark-1 mt-8">{!! mb_strimwidth(strip_tags($next_post->title), 0, 60, '...') !!}</p>
                                            </div>
                                            <div class="related-nav__arrow">
                                                <i class="icon size-20 pt-5" data-feather="arrow-right"></i>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
