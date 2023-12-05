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

                    <p data-anim-child="slide-up delay-2" class="masthead__text text-20 text-white mt-25 lh-16">
                        {!! $page->description ?? '' !!}
                    </p>

                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
        <div data-anim-wrap class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row y-gap-30">
                    @if ($blogs)
                        @foreach ($blogs as $blog)
                            <div data-anim-child="slide-up delay-3" class="col-lg-3 col-md-4">
                                <a href="{{ route('blog-details',['slug' => $blog->slug]) }}" class="blogCard -type-1">
                                    <div class="blogCard__image">
                                        <img class="w-1/1 rounded-8" src="{{$blog->getImage1()}}" alt="image">
                                    </div>
                                    <div class="blogCard__content mt-20">
                                        <h4 class="blogCard__title text-18 lh-15 fw-500 mt-5">
                                            {{  mb_strimwidth(strip_tags($blog->title), 0, 60, '...') }}
                                           
                                        </h4>
                                        <div class="blogCard__date mt-5">{{ date('M d, Y', strtotime($blog->blog_date)) }}</div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                       

                    </div>

                    <div class="row justify-center pt-60 lg:pt-40">
                        <div class="col-auto">
                            <div class="pagination">
                                {{ $blogs->appends(request()->input())->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
