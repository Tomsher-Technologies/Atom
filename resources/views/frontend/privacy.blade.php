@extends('layouts.app.sub')
@section('content')
    <section class="page-header -type-1">
        <div class="container pt-50">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1">

                            <h1 class="page-header__title">{!! $page->title !!}</h1>

                        </div>

                        <div data-anim="slide-up delay-2">

                            <p class="page-header__text">
                                {!! $page->sub_title !!}
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="layout-pt-md layout-pb-lg">
        <div data-anim-wrap class="container">
            <div data-anim="slide-up delay-3" class="row justify-center">
                {!! $page->description !!}
            </div>
        </div>
    </section>
    @include('frontend.common.proud_blue')
@endsection
